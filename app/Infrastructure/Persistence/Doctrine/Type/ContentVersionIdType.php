<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Type;

use App\Domain\Documentation\ContentVersionId;

/**
 * @template-extends GitObjectType<ContentVersionId>
 */
final class ContentVersionIdType extends GitObjectType
{
    protected static function getClass(): string
    {
        return ContentVersionId::class;
    }
}
