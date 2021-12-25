<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity\Common;

use Carbon\CarbonInterface;

interface ProvidesUpdatedAt
{
    /**
     * @return CarbonInterface|null
     */
    public function updatedAt(): ?CarbonInterface;

    /**
     * @param \DateTimeInterface|null $now
     * @return $this
     */
    public function touch(\DateTimeInterface $now = null): self;
}
