<?php

declare(strict_types=1);

namespace App\Infrastructure\Doctrine\Listener;

use App\ContentRenderer\ContentRendererInterface;
use App\ContentRenderer\FactoryInterface;
use App\ContentRenderer\Type;
use App\Domain\Documentation\Documentation;
use App\Domain\Shared\Listener;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class DocumentationContentRenderer extends Listener
{
    public function __construct(
        private readonly FactoryInterface $factory
    ) {
    }

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
        $version = $entity->version;

        return $version->menuPage === $entity->urn;
    }

    public function prePersist(PrePersistEventArgs $e): void
    {
        $this->on($e, Documentation::class, function (Documentation $entity): void {
            $entity->translation->renderWithVersion(
                $entity->version,
                $this->getRendererForTranslation($entity),
            );

            $entity->source->renderWithVersion(
                $entity->version,
                $this->getRendererForSource($entity),
            );
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
                $entity->translation->renderWithVersion(
                    $entity->version,
                    $this->getRendererForTranslation($entity),
                );
            }

            if ($e->hasChangedField('content.source') || ! $entity->source->isRendered()) {
                $entity->source->renderWithVersion(
                    $entity->version,
                    $this->getRendererForSource($entity),
                );
            }
        });
    }
}
