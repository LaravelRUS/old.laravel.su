<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity\Common;

use Doctrine\ORM\Event\LifecycleEventArgs;

/**
 * Class Listener
 */
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
