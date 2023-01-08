<?php

declare(strict_types=1);

namespace App\Entity\Common;

use Doctrine\ORM\Event\LifecycleEventArgs;

abstract class Listener
{
    /**
     * @param LifecycleEventArgs $e
     * @return void
     */
    protected function save(LifecycleEventArgs $e): void
    {
        $e->getEntityManager()
            ->getUnitOfWork()
            ->computeChangeSets();
    }

    /**
     * @param LifecycleEventArgs $e
     * @param string $entity
     * @param \Closure $cb
     * @return $this
     */
    protected function on(LifecycleEventArgs $e, string $entity, \Closure $cb): self
    {
        $haystack = $e->getEntity();

        if ($haystack instanceof $entity) {
            $cb($haystack);
        }

        return $this;
    }
}
