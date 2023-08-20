<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Type;

use App\Domain\History\HistoryId;

/**
 * @template-extends UuidType<HistoryId>
 */
final class HistoryIdType extends UuidType
{
    protected static function getClass(): string
    {
        return HistoryId::class;
    }
}
