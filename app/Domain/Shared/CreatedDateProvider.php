<?php

declare(strict_types=1);

namespace App\Domain\Shared;

use Carbon\CarbonImmutable;
use Doctrine\ORM\Mapping as ORM;
use Psr\Clock\ClockInterface;

/**
 * @mixin CreatedDateProviderInterface
 * @psalm-require-implements CreatedDateProviderInterface
 */
trait CreatedDateProvider
{
    #[ORM\Column(name: 'created_at', type: 'datetime_immutable', options: [
        'default' => 'CURRENT_TIMESTAMP',
    ])]
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

    #[ORM\PrePersist]
    public function onPrePersistCreatedField(): void
    {
        $this->wasCreatedAt(CarbonImmutable::now());
    }
}
