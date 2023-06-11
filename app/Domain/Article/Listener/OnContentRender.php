<?php

declare(strict_types=1);

namespace App\Domain\Article\Listener;

use App\ContentRenderer\ContentRendererInterface;
use App\ContentRenderer\FactoryInterface;
use App\ContentRenderer\Type;
use App\Domain\Article\Article;
use App\Domain\Shared\Listener;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

final class OnContentRender extends Listener
{
    /**
     * @var ContentRendererInterface
     */
    private readonly ContentRendererInterface $renderer;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(
        FactoryInterface $factory,
    ) {
        $this->renderer = $factory->create(Type::ARTICLE);
    }

    /**
     * @param LifecycleEventArgs $e
     * @return void
     */
    public function prePersist(LifecycleEventArgs $e): void
    {
        $this->on($e, Article::class, function (Article $entity): void {
            $entity->body->renderUsing($this->renderer);
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
                $entity->body->renderUsing($this->renderer);
            }
        });
    }
}
