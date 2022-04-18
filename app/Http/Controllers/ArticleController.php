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
use Illuminate\Contracts\View\Factory as ViewFactoryInterface;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class ArticleController
{
    /**
     * @var string
     */
    private const ERROR_PAGE_NOT_FOUND = 'Article not found';

    /**
     * @param ArticlesRepository $articles
     * @param ViewFactoryInterface $factory
     */
    public function __construct(
        private readonly ViewFactoryInterface $factory,
        private readonly ArticlesRepository $articles
    ) {
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
