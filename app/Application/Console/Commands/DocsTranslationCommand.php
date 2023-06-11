<?php

declare(strict_types=1);

namespace App\Application\Console\Commands;

use App\Domain\Documentation\Documentation;
use App\Domain\Documentation\DocumentationRepositoryInterface;
use App\Domain\Documentation\VersionRepositoryInterface;
use App\GitHub\BranchInterface;
use App\GitHub\FileInterface;
use App\GitHub\Repository;
use Doctrine\ORM\EntityManagerInterface;
use Github\Client;
use Illuminate\Contracts\Config\Repository as Config;

abstract class DocsTranslationCommand extends Command
{
    /**
     * @var string
     */
    private const NOTICE_TRANSLATION_EXTRA_BRANCH =
        '<error>Skip the translation branch %s, which does not correspond to the source</error>';

    /**
     * @var string
     */
    private const NOTICE_TRANSLATION_EXTRA_FILE =
        '<error>Skip the translation file %s, which does not correspond to the source</error>';

    protected readonly Repository $source;

    protected readonly Repository $translation;

    public function __construct(Client $client, Config $config)
    {
        parent::__construct();

        \ini_set('memory_limit', -1);

        $this->source = new Repository(
            $client,
            $config->get('documentation.laravel-source.user'),
            $config->get('documentation.laravel-source.repository')
        );

        $this->translation = new Repository(
            $client,
            $config->get('documentation.laravel-translation.user'),
            $config->get('documentation.laravel-translation.repository')
        );

    }

    public function handle(
        EntityManagerInterface $em,
        VersionRepositoryInterface $versions,
        DocumentationRepositoryInterface $docs,
    ): void {
        //
        // Считываем файлы переводов и проверяем их статус в БД.
        //
        foreach ($this->translation->getBranches() as $branch) {
            $this->info(\sprintf('Translation %s updating', $branch->getName()));
            $this->loadTranslations($em, $branch, $versions, $docs);
            $this->comment(\sprintf('Translation %s updated', $branch->getName()));
        }
    }

    private function loadTranslations(
        EntityManagerInterface $em,
        BranchInterface $branch,
        VersionRepositoryInterface $versions,
        DocumentationRepositoryInterface $docs
    ): void {
        $version = $versions->findByName($branch->getName());

        //
        // Может возникнуть ситуация, когда ветка в репозитории переводов не
        // относится к ветке с версиями. Скипаем такие ситуации.
        //
        if (! $version) {
            $this->line(\sprintf(self::NOTICE_TRANSLATION_EXTRA_BRANCH, $branch->getName()));

            return;
        }

        $files = $branch->getFiles();
        $progress = $this->progress($files->count());

        //
        // Начинаем читать файлы переводов
        //
        foreach ($files as $file) {
            $progress->setMessage('(' . $branch->getName() . ') ' . $file->getUrn());
            $progress->advance();

            //
            // В том случае, если файл не является корректным (например ридми
            // или не маркдаун), то игнорируем его при чтении файлов переводов.
            //
            if (! $file->isSyncable()) {
                continue;
            }

            $page = $docs->findByVersionAndUrn($version, $file->getUrn());

            //
            // Если такого файла нет в базе данных, то файл из репозитория с
            // переводами не является страницей документации. Скипаем такое.
            //
            if (! $page) {
                $progress->setMessage(\sprintf(self::NOTICE_TRANSLATION_EXTRA_FILE, $file->getPathname()));

                continue;
            }

            $this->each($page, $file);

            $em->persist($page);
            $em->flush();
        }

        $progress->clear();
        $em->flush();
    }

    /**
     * @param Documentation $page
     * @param FileInterface $file
     * @return void
     */
    abstract protected function each(Documentation $page, FileInterface $file): void ;
}
