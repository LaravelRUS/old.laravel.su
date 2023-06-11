<?php

declare(strict_types=1);

namespace App\Domain\Shared;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;
use Doctrine\ORM\Mapping as ORM;
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
    #[ORM\Column(name: 'updated_at', type: 'datetime_immutable', nullable: true)]
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

    #[ORM\PrePersist]
    public function onPrePersistUpdatedField(): void
    {
        $this->touch(CarbonImmutable::now());
    }

    #[ORM\PreUpdate]
    public function onPreUpdateUpdatedField(): void
    {
        $this->touch(CarbonImmutable::now());
    }
}
