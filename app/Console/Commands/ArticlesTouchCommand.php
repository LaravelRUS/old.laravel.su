<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Console\Commands;

use App\Entity\Article;
use App\Entity\Repository\ArticlesRepository;
use App\Entity\Repository\VersionsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Support\Collection;

/**
 * Перерисовка (ререндер) содержимого всех статей
 */
class ArticlesTouchCommand extends Command
{
    /**
     * {@inheritDoc}
     */
    protected $signature = 'su:articles:touch';

    /**
     * {@inheritDoc}
     */
    protected $description = 'Update articles and execute renderer';

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;

    /**
     * TouchDocsCommand constructor.
     *
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();

        $this->em = $em;
    }

    /**
     * @param ArticlesRepository $repository
     * @return void
     */
    public function handle(ArticlesRepository $repository): void
    {
        /** @var Article[]|Collection $articles */
        $articles = $repository->all();

        $progress = $this->progress($articles->count());

        foreach ($articles as $article) {
            $progress->setMessage($article->title . ' (' . $article->urn . ')');
            $progress->advance();

            // Reset rendered content
            $article->body->clear();
            $article->touch();

            $this->em->persist($article);
        }

        $progress->clear();
        $this->em->flush();
    }
}
