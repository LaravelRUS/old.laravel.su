<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Listener;

use App\ContentRenderer\ContentRendererInterface;
use App\ContentRenderer\FactoryInterface;
use App\ContentRenderer\Type;
use App\Domain\Article\Article;
use App\Domain\Shared\Listener;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

final class ArticleContentRenderer extends Listener
{
    private readonly ContentRendererInterface $renderer;

    public function __construct(
        FactoryInterface $factory,
    ) {
        $this->renderer = $factory->create(Type::ARTICLE);
    }

    public function prePersist(PrePersistEventArgs $e): void
    {
        $this->on($e, Article::class, function (Article $entity): void {
            $entity->body->renderUsing($this->renderer);
        });
    }

    public function preUpdate(PreUpdateEventArgs $e): void
    {
        $this->on($e, Article::class, function (Article $entity) use ($e) {
            if ($e->hasChangedField('body.source') || ! $entity->body->isRendered()) {
                $entity->body->renderUsing($this->renderer);
            }
        });
    }
}
