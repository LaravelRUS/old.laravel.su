<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity\Common;

/**
 * Interface Identifiable
 */
interface Identifiable
{
    /**
     * @return bool
     */
    public function isNew(): bool;

    /**
     * @return int|null
     */
    public function getId(): ?int;
}
