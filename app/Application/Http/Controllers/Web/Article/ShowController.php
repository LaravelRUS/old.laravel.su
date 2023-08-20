<?php

declare(strict_types=1);

namespace App\Application\Http\Controllers\Web\Article;

use App\Domain\Article\ArticleRepositoryInterface;
use Illuminate\Contracts\View\Factory as ViewFactoryInterface;
use Illuminate\Contracts\View\View as ViewInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final readonly class ShowController
{
    private const ERROR_PAGE_NOT_FOUND = 'Article not found';

    public function __construct(
        private ViewFactoryInterface $factory,
        private ArticleRepositoryInterface $articles,
    ) {
    }

    public function __invoke(string $urn): ViewInterface
    {
        $article = $this->articles->findByUrn($urn);

        if (!$article) {
            throw new NotFoundHttpException(self::ERROR_PAGE_NOT_FOUND);
        }

        return $this->factory->make('page.articles.show', [
            'article' => $this->articles->findByUrn($urn),
        ]);
    }
}
