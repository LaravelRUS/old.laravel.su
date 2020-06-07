<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity\Documentation\Translation;

/**
 * Class Status
 */
final class Status
{
    /**
     * Перевод отсутсвует
     *
     * @var int
     */
    public const MISSING = 0x00;

    /**
     * Перевод актуален
     *
     * @var int
     */
    public const ACTUAL = 0x01;

    /**
     * Перевод немного отстаёт
     *
     * @var int
     */
    public const BEHIND = 0x02;

    /**
     * Перевод сильно отстаёт
     *
     * @var int
     */
    public const FAR_BEHIND = 0x03;
}
