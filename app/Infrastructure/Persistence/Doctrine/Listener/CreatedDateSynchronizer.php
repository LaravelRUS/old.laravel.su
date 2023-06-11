<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Listener;

use App\Domain\Shared\CreatedDateProviderInterface;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Psr\Clock\ClockInterface;

final readonly class CreatedDateSynchronizer
{
    public function __construct(
        private ClockInterface $clock,
    ) {
    }

    public function prePersist(LifecycleEventArgs $e): void
    {
        $entity = $e->getObject();

        if ($entity instanceof CreatedDateProviderInterface) {
            $entity->wasCreatedAt($this->clock);
        }
    }
}
