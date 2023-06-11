<?php

declare(strict_types=1);

namespace App\Application\Console\Commands;

use App\Domain\Article\ArticleRepositoryInterface;
use App\Infrastructure\Persistence\Doctrine\Repository\ArticleDatabaseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * Команда, отвечающая за перерисовку (ререндер) содержимого всех статей из
 * оригинального Markdown формата в формат HTML для отображения содержимого на
 * сайте.
 *
 * Чтобы Laravel видел эту консольную команду она была добавлена в
 * список доступных команд, в поле {@see \App\Application\Console\Kernel::$commands}.
 *
 * Подробнее о консольных командах можно прочитать в документации по
 * адресу {@link https://laravel.su/docs/8.x/artisan#writing-commands}.
 */
class ArticlesTouchCommand extends Command
{
    /**
     * Имя и сигнатура консольной команды. Т.е. для вызова этой команды следует
     * открыть и выполнить `php artisan su:articles:touch`, после этого Laravel
     * вызовет метод {@see ArticlesTouchCommand::handle()}.
     *
     * {@inheritDoc}
     */
    protected $signature = 'su:articles:touch';

    /**
     * {@inheritDoc}
     */
    protected $description = 'Update articles and execute renderer';

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly ClockInterface $clock,
    ) {
        parent::__construct();
    }

    public function handle(ArticleRepositoryInterface $repository): void
    {
        $articles = $repository->all();
        $count = $articles instanceof \Countable || \is_array($articles)
            ? \count($articles)
            : \count([...$articles])
        ;
        $progress = $this->progress($count);

        foreach ($articles as $article) {
            $progress->setMessage($article->title . ' (' . $article->urn . ')');
            $progress->advance();

            // Reset rendered content
            $article->body->clear();

            $article->touch($this->clock);

            $this->em->persist($article);
        }

        $progress->clear();
        $this->em->flush();
    }
}
