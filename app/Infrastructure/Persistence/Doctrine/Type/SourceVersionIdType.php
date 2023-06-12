<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Type;

use App\Domain\Documentation\SourceVersionId;

/**
 * @template-extends GitObjectType<SourceVersionId>
 */
final class SourceVersionIdType extends GitObjectType
{
    protected static function getClass(): string
    {
        return SourceVersionId::class;
    }
}
