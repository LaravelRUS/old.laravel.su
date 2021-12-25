<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity\Documentation\Translation;

enum Status: int
{
    /**
     * Перевод отсутсвует
     */
    case MISSING = 0x00;

    /**
     * Перевод актуален
     */
    case ACTUAL = 0x01;

    /**
     * Перевод немного отстаёт
     */
    case BEHIND = 0x02;

    /**
     * Перевод сильно отстаёт
     */
    case FAR_BEHIND = 0x03;
}
