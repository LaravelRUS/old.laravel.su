<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity\Article\Listener;

use App\ContentRenderer\Renderer\ContentRendererInterface;
use App\ContentRenderer\Renderer\MarkdownRenderer;
use App\ContentRenderer\Renderer\PublicContentRendererInterface;
use App\Entity\Article;
use App\Entity\Common\Listener;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

/**
 * Class OnContentRender
 */
final class OnContentRender extends Listener
{
    /**
     * @var ContentRendererInterface
     */
    private ContentRendererInterface $renderer;

    /**
     * OnContentRender constructor.
     *
     * @param MarkdownRenderer $renderer
     */
    public function __construct(MarkdownRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @param LifecycleEventArgs $e
     * @return void
     */
    public function prePersist(LifecycleEventArgs $e): void
    {
        $this->on($e, Article::class, function (Article $entity): void {
            $entity->body->render($this->renderer, true);
        });
    }

    /**
     * @param PreUpdateEventArgs $e
     * @return void
     */
    public function preUpdate(PreUpdateEventArgs $e): void
    {
        $this->on($e, Article::class, function (Article $entity) use ($e) {
            if ($e->hasChangedField('body.source') || ! $entity->body->isRendered()) {
                $entity->body->render($this->renderer, true);
            }
        });
    }
}
