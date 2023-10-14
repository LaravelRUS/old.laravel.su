<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Listener;

use App\ContentRenderer\ContentRendererInterface;
use App\ContentRenderer\FactoryInterface;
use App\ContentRenderer\Type;
use App\Domain\Documentation\Documentation;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

final readonly class DocumentationContentRenderer
{
    public function __construct(
        private FactoryInterface $factory,
    ) {}

    private function getRendererForSource(Documentation $entity): ContentRendererInterface
    {
        if ($this->isMenu($entity)) {
            return $this->factory->create(Type::MENU);
        }

        return $this->factory->create(Type::DOCUMENTATION);
    }

    private function getRendererForTranslation(Documentation $entity): ContentRendererInterface
    {
        if ($this->isMenu($entity)) {
            return $this->factory->create(Type::MENU_TRANSLATION);
        }

        return $this->factory->create(Type::DOCUMENTATION_TRANSLATION);
    }

    private function isMenu(Documentation $entity): bool
    {
        $version = $entity->getVersion();

        return $version->menuPage === $entity->getUrn();
    }

    public function prePersist(PrePersistEventArgs $e): void
    {
        $entity = $e->getObject();

        if (!$entity instanceof Documentation) {
            return;
        }

        $entity->translation->renderWithVersion(
            $entity->getVersion(),
            $this->getRendererForTranslation($entity),
        );

        $entity->source->renderWithVersion(
            $entity->getVersion(),
            $this->getRendererForSource($entity),
        );
    }

    public function preUpdate(PreUpdateEventArgs $e): void
    {
        $entity = $e->getObject();

        if (!$entity instanceof Documentation) {
            return;
        }

        if ($e->hasChangedField('translation.source') || ! $entity->translation->isRendered()) {
            $entity->translation->renderWithVersion(
                $entity->getVersion(),
                $this->getRendererForTranslation($entity),
            );
        }

        if ($e->hasChangedField('content.source') || ! $entity->source->isRendered()) {
            $entity->source->renderWithVersion(
                $entity->getVersion(),
                $this->getRendererForSource($entity),
            );
        }
    }
}
