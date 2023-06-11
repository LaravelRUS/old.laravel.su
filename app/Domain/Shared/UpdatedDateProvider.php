<?php

declare(strict_types=1);

namespace App\Domain\Shared;

use Psr\Clock\ClockInterface;

/**
 * @mixin UpdatedDateProviderInterface
 * @psalm-require-implements UpdatedDateProviderInterface
 */
trait UpdatedDateProvider
{
    /**
     * @var \DateTimeImmutable|null
     */
    private ?\DateTimeImmutable $updatedAt = null;

    public function updatedAt(): \DateTimeImmutable|null
    {
        return $this->updatedAt;
    }

    public function touch(\DateTimeInterface|ClockInterface $now): void
    {
        if ($now instanceof ClockInterface) {
            $now = $now->now();
        }

        if ($now instanceof \DateTime) {
            $now = \DateTimeImmutable::createFromMutable($now);
        }

        $this->updatedAt = clone $now;
    }
}
