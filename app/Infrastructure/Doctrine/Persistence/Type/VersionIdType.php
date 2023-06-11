<?php

declare(strict_types=1);

namespace App\Infrastructure\Doctrine\Persistence\Type;

use App\Domain\Documentation\VersionId;

/**
 * @template-extends UuidType<VersionId>
 */
final class VersionIdType extends UuidType
{
    protected static function getClass(): string
    {
        return VersionId::class;
    }
}
