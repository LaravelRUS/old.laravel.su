<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity\Documentation\Listener;

use App\ContentRenderer\Renderer\ContentRendererInterface;
use App\Entity\Common\Listener;
use App\Entity\Documentation;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

/**
 * Class OnContentRender
 */
class OnContentRender extends Listener
{
    /**
     * @var ContentRendererInterface
     */
    private ContentRendererInterface $renderer;

    /**
     * OnContentRender constructor.
     *
     * @param ContentRendererInterface $renderer
     */
    public function __construct(ContentRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @param LifecycleEventArgs $e
     * @return void
     */
    public function prePersist(LifecycleEventArgs $e): void
    {
        $this->on($e, Documentation::class, function (Documentation $entity): void {
            $entity->translation->renderWithVersion($entity->version, $this->renderer, false);
            $entity->source->renderWithVersion($entity->version, $this->renderer, false);
        });
    }

    /**
     * @param PreUpdateEventArgs $e
     * @return void
     */
    public function preUpdate(PreUpdateEventArgs $e): void
    {
        $this->on($e, Documentation::class, function (Documentation $entity) use ($e) {
            if ($e->hasChangedField('translation.source') || ! $entity->translation->isRendered()) {
                $entity->translation->renderWithVersion($entity->version, $this->renderer, false);
            }

            if ($e->hasChangedField('content.source') || ! $entity->source->isRendered()) {
                $entity->source->renderWithVersion($entity->version, $this->renderer, false);
            }
        });
    }
}
