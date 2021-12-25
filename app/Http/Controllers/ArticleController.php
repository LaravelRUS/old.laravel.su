<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Entity\Repository\ArticlesRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ArticleController
{
    /**
     * @var string
     */
    private const ERROR_PAGE_NOT_FOUND = 'Article not found';

    /**
     * @var Factory
     */
    private Factory $factory;

    /**
     * @var ArticlesRepository
     */
    private ArticlesRepository $articles;

    /**
     * ArticleController constructor.
     *
     * @param ArticlesRepository $articles
     * @param Factory $factory
     */
    public function __construct(ArticlesRepository $articles, Factory $factory)
    {
        $this->factory = $factory;
        $this->articles = $articles;
    }

    /**
     * @param string $urn
     * @return View
     */
    public function index(string $urn): View
    {
        $article = $this->articles->findByUrn($urn);

        if (! $article) {
            throw new NotFoundHttpException(self::ERROR_PAGE_NOT_FOUND);
        }

        return $this->factory->make('page.articles.show', [
            'article' => $this->articles->findByUrn($urn),
        ]);
    }
}
