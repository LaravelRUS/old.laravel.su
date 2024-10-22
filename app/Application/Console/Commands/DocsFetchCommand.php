<?php

declare(strict_types=1);

namespace App\Application\Console\Commands;

use App\Domain\Documentation\Documentation;
use App\Domain\Documentation\DocumentationRepositoryInterface;
use App\Domain\Version\Version;
use App\Domain\Version\VersionRepositoryInterface;
use App\GitHub\BranchInterface;
use App\GitHub\FileInterface;
use App\GitHub\Repository;
use Doctrine\ORM\EntityManagerInterface;
use Github\Client;

/**
 * Команда для скачивания оригинала (версий и страниц).
 *
 * Чтобы Laravel видел эту консольную команду она была добавлена в
 * список доступных команд, в поле {@see \App\Application\Console\Kernel::$commands}.
 *
 * Подробнее о консольных командах можно прочитать в документации по
 * адресу {@link https://laravel.su/docs/8.x/artisan#writing-commands}.
 */
class DocsFetchCommand extends Command
{
    /**
     * Имя и сигнатура консольной команды. Т.е. для вызова этой команды следует
     * открыть и выполнить `php artisan su:docs:fetch`, после этого Laravel
     * вызовет метод {@see DocsFetchCommand::handle()}.
     *
     * {@inheritDoc}
     */
    protected $signature = 'su:docs:fetch';

    /**
     * {@inheritDoc}
     */
    protected $description = 'Download and update source documentation';

    private readonly Repository $source;

    public function __construct(Client $client)
    {
        parent::__construct();

        \ini_set('memory_limit', -1);

        $this->source = new Repository($client, 'laravel', 'docs');
    }

    public function handle(
        EntityManagerInterface $em,
        VersionRepositoryInterface $versions,
        DocumentationRepositoryInterface $docs,
    ): void {
        //
        // Синхронизируем все доступные версии из оригинальной документации.
        //
        $this->info('Versions updating');
        $branches = \iterator_to_array($this->loadVersions($em, $versions));
        $this->comment('Versions updated');

        //
        // Затем обновляем данные в БД из оригинальной документации:
        //     - Внутреннее содержимое (текст)
        //     - Коммит
        //

        /**
         * @var BranchInterface $branch
         * @var Version $version
         */
        foreach ($branches as ['branch' => $branch, 'version' => $version]) {
            $this->info(\sprintf('Source %s documentation updating', $branch->getName()));

            foreach($this->loadFiles($em, $docs, $branch, $version) as $_);

            $this->comment(\sprintf('Source %s documentation updated', $branch->getName()));
        }
    }

    /**
     * @return \Traversable<non-empty-string, array{branch: BranchInterface, version: Version}>
     */
    private function loadVersions(EntityManagerInterface $em, VersionRepositoryInterface $versions): \Traversable
    {
        $branches = $this->source->getBranches();
        $progress = $this->progress($branches->count());

        foreach ($branches as $branch) {
            $progress->setMessage($branch->getName());
            $progress->advance();

            //
            // В том случае, если ветка временная (или master), то игнорируем
            // её синхронизацию.
            //
            if (! $branch->isSyncable()) {
                continue;
            }

            $version = $versions->findByName($branch->getName())
                ?? new Version($branch->getName());

            $em->persist($version);

            yield $branch->getName() => ['branch' => $branch, 'version' => $version];
        }

        $em->flush();
        $progress->clear();
    }

    /**
     * @return \Traversable<non-empty-string, array{file: FileInterface, page: Documentation}>
     */
    private function loadFiles(
        EntityManagerInterface $em,
        DocumentationRepositoryInterface $docs,
        BranchInterface $branch,
        Version $ver,
    ): \Traversable {
        $files = $branch->getFiles();
        $progress = $this->progress($files->count());

        foreach ($files as $file) {
            $progress->setMessage('(' . $branch->getName() . ') ' . $file->getUrn());
            $progress->advance();

            //
            // В том случае, если файл не является корректным (например ридми
            // или не маркдаун), то игнорируем его при синхронизации.
            //
            if (! $file->isSyncable()) {
                continue;
            }

            $page = $docs->findByVersionAndUrn($ver, $file->getUrn());

            //
            // Если страницы документации нет, то создаём новую
            //
            if (! $page) {
                $page = new Documentation($ver, $file->getTitle(), $file->getUrn());
            }

            //
            // Если хеш коммита отличается от того, что был сохранён в базе, то
            // обновляем его оригинальное содержимое.
            //
            if (! $page->source->isVersionedBy($file->getCommit())) {
                $page->source->update($file->getContents(), $file->getCommit());
            }

            yield $file->getUrn() => ['file' => $file, 'page' => $page];

            $em->persist($page);
        }

        $progress->clear();
        $em->flush();
    }
}
