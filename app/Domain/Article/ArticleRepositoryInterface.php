<?php

declare(strict_types=1);

namespace App\Domain\Article;

interface ArticleRepositoryInterface
{
    /**
     * @return iterable<array-key, Article>
     */
    public function all(): iterable;

    /**
     * @param non-empty-string $urn
     */
    public function findByUrn(string $urn): ?Article;
}
