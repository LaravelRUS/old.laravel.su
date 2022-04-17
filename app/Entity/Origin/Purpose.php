<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
