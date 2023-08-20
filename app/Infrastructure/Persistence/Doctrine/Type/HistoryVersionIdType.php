<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Type;

use App\Domain\History\VersionId;

/**
 * @template-extends GitObjectType<VersionId>
 */
final class HistoryVersionIdType extends GitObjectType
{
    protected static function getClass(): string
    {
        return VersionId::class;
    }
}
