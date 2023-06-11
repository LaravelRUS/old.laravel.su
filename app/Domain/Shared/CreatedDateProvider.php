<?php

declare(strict_types=1);

namespace App\Domain\Shared;

use Psr\Clock\ClockInterface;

/**
 * @mixin CreatedDateProviderInterface
 * @psalm-require-implements CreatedDateProviderInterface
 */
trait CreatedDateProvider
{
    private \DateTimeImmutable $createdAt;

    public function createdAt(): \DateTimeImmutable
    {
        return $this->createdAt ??= new \DateTimeImmutable();
    }

    public function wasCreatedAt(\DateTimeInterface|ClockInterface $date): void
    {
        if ($date instanceof ClockInterface) {
            $date = $date->now();
        }

        if ($date instanceof \DateTime) {
            $date = \DateTimeImmutable::createFromMutable($date);
        }

        $this->createdAt = clone $date;
    }
}
