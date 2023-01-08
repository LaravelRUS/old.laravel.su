<?php

declare(strict_types=1);

namespace App\Entity\Origin;

enum Purpose: string
{
    /**
     * Задача репозитория предоставить исходный текст.
     */
    case SOURCE = 'source';

    /**
     * Задача репозитория предоставить перевод.
     */
    case TRANSLATION = 'translation';

    /**
     * @return list<non-empty-string>
     */
    public static function values(): array
    {
        return \array_map(static fn (self $t): string => $t->value, self::cases());
    }
}
