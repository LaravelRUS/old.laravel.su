<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Class ArticleController
 */
class ArticleController
{
    /**
     * @var Factory
     */
    private Factory $factory;

    /**
     * ArticleController constructor.
     *
     * @param Factory $factory
     */
    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param string $slug
     * @return View
     */
    public function index(string $slug): View
    {
        $article = Article::query()
            ->where('slug', $slug)
            ->firstOrFail();

        return $this->factory->make('articles.show_article', [
            'article' => $article,
        ]);
    }
}
