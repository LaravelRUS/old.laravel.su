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
use App\GitHub\BranchInterface;
use App\GitHub\FileInterface;
use App\GitHub\Repository;
use Doctrine\ORM\EntityManagerInterface;
use Github\Client;

/**
 * Class DocsTranslationCommand
 */
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

    /**
     * @var Repository
     */
    protected Repository $source;

    /**
     * @var Repository
     */
    protected Repository $translation;

    /**
     * @var EntityManagerInterface
     */
    protected EntityManagerInterface $em;

    /**
     * TestCommand constructor.
     *
     * @param Client $client
     * @param EntityManagerInterface $em
     */
    public function __construct(Client $client, EntityManagerInterface $em)
    {
        parent::__construct();

        $this->em = $em;
        $this->source = new Repository($client, 'laravel', 'docs');
        $this->translation = new Repository($client, 'LaravelRUS', 'docs');
    }

    /**
     * @param VersionsRepository $versions
     * @param DocumentationRepository $docs
     * @return void
     */
    public function handle(VersionsRepository $versions, DocumentationRepository $docs): void
    {
        //
        // Считываем файлы переводов и проверяем их статус в БД.
        //
        foreach ($this->translation->getBranches() as $branch) {
            $this->info(\sprintf('Translation %s updating', $branch->getName()));
            $this->loadTranslations($branch, $versions, $docs);
            $this->comment(\sprintf('Translation %s updated', $branch->getName()));
        }
    }

    /**
     * @param BranchInterface $branch
     * @param VersionsRepository $versions
     * @param DocumentationRepository $docs
     * @return void
     */
    private function loadTranslations(
        BranchInterface $branch,
        VersionsRepository $versions,
        DocumentationRepository $docs
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

            $this->em->persist($page);
            $this->em->flush();
        }

        $progress->clear();
        $this->em->flush();
    }

    /**
     * @param Documentation $page
     * @param FileInterface $file
     * @return void
     */
    abstract protected function each(Documentation $page, FileInterface $file): void ;
}
