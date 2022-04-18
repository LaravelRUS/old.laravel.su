<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Console\Commands;

use App\Entity\Documentation;
use App\Entity\Repository\DocumentationRepository;
use App\Entity\Repository\VersionsRepository;
use App\Entity\Version;
use App\GitHub\BranchInterface;
use App\GitHub\Repository;
use Doctrine\ORM\EntityManagerInterface;
use Github\Client;

/**
 * Команда для скачивания оригинала (версий и страниц).
 *
 * Чтобы Laravel видел эту консольную команду она была добавлена в
 * список доступных команд, в поле {@see \App\Console\Kernel::$commands}.
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

    /**
     * @var Repository
     */
    private Repository $source;

    /**
     * @param Client $client
     * @param EntityManagerInterface $em
     */
    public function __construct(Client $client, private readonly EntityManagerInterface $em)
    {
        parent::__construct();

        \ini_set('memory_limit', -1);

        $this->source = new Repository($client, 'laravel', 'docs');
    }

    /**
     * @param VersionsRepository $versions
     * @param DocumentationRepository $docs
     * @return void
     */
    public function handle(VersionsRepository $versions, DocumentationRepository $docs): void
    {
        //
        // Синхронизируем все доступные версии из оригинальной документации.
        //
        $this->info('Versions updating');
        $branches = \iterator_to_array($this->loadVersions($versions));
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

            foreach($this->loadFiles($docs, $branch, $version) as $_);

            $this->comment(\sprintf('Source %s documentation updated', $branch->getName()));
        }
    }

    /**
     * @param VersionsRepository $versions
     * @return \Traversable
     */
    private function loadVersions(VersionsRepository $versions): \Traversable
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

            $version = $versions->findByNameOrNew($branch->getName());

            $this->em->persist($version);

            yield $branch->getName() => ['branch' => $branch, 'version' => $version];
        }

        $this->em->flush();
        $progress->clear();
    }

    /**
     * @param DocumentationRepository $docs
     * @param Version $ver
     * @param BranchInterface $branch
     * @return \Traversable
     */
    private function loadFiles(DocumentationRepository $docs, BranchInterface $branch, Version $ver): \Traversable
    {
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
            if (! $page->source->isActual($file->getCommit())) {
                $page->source->update($file->getContents(), $file->getCommit());
            }

            yield $file->getUrn() => ['file' => $file, 'page' => $page];

            $this->em->persist($page);
        }

        $this->em->flush();
        $progress->clear();
    }
}
