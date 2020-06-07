<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity\Common;

use Carbon\Carbon;

/**
 * Interface ProvidesUpdatedAt
 */
interface ProvidesUpdatedAt
{
    /**
     * @return Carbon|null
     */
    public function updatedAt(): ?Carbon;

    /**
     * Note: "self" return typehint does not work correctly in PhpStorm,
     * generating errors.
     *
     * @param \DateTimeInterface|null $now
     * @return ProvidesUpdatedAt|$this
     */
    public function touch(\DateTimeInterface $now = null): ProvidesUpdatedAt;
}
