<?php

declare(strict_types=1);

namespace App\Domain\Article;

interface ArticleRepositoryInterface
{
    /**
     * @param non-empty-string $urn
     */
    public function findByUrn(string $urn): ?Article;
}
