<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Listener;

use App\ContentRenderer\ContentRendererInterface;
use App\ContentRenderer\FactoryInterface;
use App\ContentRenderer\Type;
use App\Domain\Article\Article;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

final readonly class ArticleContentRenderer
{
    private ContentRendererInterface $renderer;

    public function __construct(FactoryInterface $factory)
    {
        $this->renderer = $factory->create(Type::ARTICLE);
    }

    public function prePersist(PrePersistEventArgs $e): void
    {
        $entity = $e->getObject();

        if (!$entity instanceof Article) {
            return;
        }

        $entity->body->renderUsing($this->renderer);
    }

    public function preUpdate(PreUpdateEventArgs $e): void
    {
        $entity = $e->getObject();

        if (!$entity instanceof Article) {
            return;
        }

        // - In case of content is already has been rendered.
        // - And source content has not been changed.
        if (!$e->hasChangedField('body.source') && $entity->body->isRendered()) {
            return;
        }

        $entity->body->renderUsing($this->renderer);
    }
}
