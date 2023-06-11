<?php

declare(strict_types=1);

namespace App\Domain\Shared;

use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\Event\LifecycleEventArgs;

/**
 * @deprecated Please use raw Doctrine Listener/Subscriber instead.
 */
abstract class Listener
{
    /**
     * @param LifecycleEventArgs $e
     * @return void
     */
    protected function save(LifecycleEventArgs $e): void
    {
        $em = $e->getObjectManager();

        if (!$em instanceof EntityManager) {
            return;
        }

        $uow = $em->getUnitOfWork();
        $uow->computeChangeSets();
    }

    /**
     * @param LifecycleEventArgs $e
     * @param string $entity
     * @param \Closure $cb
     * @return $this
     */
    protected function on(LifecycleEventArgs $e, string $entity, \Closure $cb): self
    {
        $haystack = $e->getObject();

        if ($haystack instanceof $entity) {
            $cb($haystack);
        }

        return $this;
    }
}
