<?php

declare(strict_types=1);

namespace App\Application\Console\Commands;

use App\Domain\Documentation\Documentation;
use App\Domain\Documentation\KeywordsGenerator;
use App\Domain\Version\VersionRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Serafim\TFIDF\Entry;

final class DocsGenerateKeywordsCommand extends Command
{
    /**
     * Имя и сигнатура консольной команды. Т.е. для вызова этой команды следует
     * открыть и выполнить `php artisan su:docs:keywords`, после этого Laravel
     * вызовет метод {@see DocsTouchCommand::handle()}.
     *
     * {@inheritDoc}
     */
    protected $signature = 'su:docs:keywords';

    /**
     * {@inheritDoc}
     */
    protected $description = 'Generate documentation keywords';

    public function __construct()
    {
        parent::__construct();

        \ini_set('memory_limit', -1);
    }

    public function handle(
        VersionRepositoryInterface $versions,
        EntityManagerInterface $em,
    ): void {
        foreach ($versions->all() as $version) {
            $progress = $this->progress();

            $generator = new KeywordsGenerator(function (Entry $entry, Documentation $page) use ($progress): void {
                $progress->setMessage(\vsprintf(
                    'Вычисление TF-IDF: <comment>%s</comment> -> [<info>%5f</info>] <info>%s</info>',
                    [
                        $page->getTitle(),
                        $entry->tfidf,
                        $entry->term,
                    ],
                ));
                $progress->advance();
            });

            foreach ($version->docs as $document) {
                // Пропускаем генерацию кейвордов для страницы:
                //  - Если страница является элементом "меню".
                //  - Если содержимое отсутствует.
                if ($document->getUrn() === $version->menuPage || $document->translation->isEmpty()) {
                    continue;
                }

                $generator->add($document);
            }

            /**
             * @var Documentation $document
             * @var iterable<array-key, Entry> $entries
             */
            foreach ($generator as $document => $entries) {
                $this->output->writeln(' - Saving <info>"' . $document->getTitle() . '"</info>');

                $document->removeKeywords();

                foreach ($entries as $entry) {
                    $document->addKeyword($entry->term);
                }

                $em->persist($document);
                $em->flush();
            }

            $progress->clear();
        }
    }
}
