<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Listener;

use App\Domain\Shared\UpdatedDateProviderInterface;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Psr\Clock\ClockInterface;

final readonly class UpdatedDateSynchronizer
{
    public function __construct(
        private ClockInterface $clock,
    ) {
    }

    private function touch(object $entity): void
    {
        if ($entity instanceof UpdatedDateProviderInterface) {
            $entity->touch($this->clock);
        }
    }

    public function prePersist(LifecycleEventArgs $e): void
    {
        $this->touch($e->getObject());
    }

    public function preUpdate(LifecycleEventArgs $e): void
    {
        $this->touch($e->getObject());
    }
}
