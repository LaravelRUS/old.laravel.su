<?php

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
