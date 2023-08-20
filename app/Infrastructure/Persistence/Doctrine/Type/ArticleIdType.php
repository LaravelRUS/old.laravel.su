<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Type;

use App\Domain\Article\ArticleId;

/**
 * @template-extends UuidType<ArticleId>
 */
final class ArticleIdType extends UuidType
{
    protected static function getClass(): string
    {
        return ArticleId::class;
    }
}
