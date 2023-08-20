<?php

declare(strict_types=1);

namespace App\Domain\Documentation;

use App\ContentRenderer\ContentRendererInterface;
use App\Domain\Shared\ValueObjectInterface;
use App\Domain\Version\Version;

/**
 * Абстрактный value-object текстового содержимого.
 */
abstract class Content implements ValueObjectInterface
{
    protected ?string $source = null;
    protected ?string $rendered = null;

    public function equals(ValueObjectInterface $object): bool
    {
        return $object === $this || (
            $object instanceof static && $object->source === $this->source
        );
    }

    /**
     * Конвертирует контент в HTML вместе с указанной версией.
     */
    public function renderWithVersion(Version $version, ContentRendererInterface $renderer): self
    {
        if ($this->source !== null) {
            $this->rendered = (string)$renderer->render(
                \str_replace('{{version}}', $version->name, $this->source),
            );
        }

        return $this;
    }

    /**
     * Очищает html-содержимое контента.
     */
    public function clear(): void
    {
        $this->rendered = null;
    }

    /**
     * Возвращает {@see true} в том случае, если контент оригинальный
     * отсутсвует и {@see false} в противном случае.
     */
    public function isEmpty(): bool
    {
        return $this->source === null || \trim($this->source) === '';
    }

    /**
     * Возвращает {@see true} в том случае, если контент
     * содержит html-содержимое и {@see false} в противном случае.
     */
    public function isRendered(): bool
    {
        return $this->rendered !== null;
    }

    public function getContent(): string
    {
        return $this->rendered ?: $this->source ?? '';
    }

    public function getRawContent(): string
    {
        return $this->source ?? '';
    }

    public function getRenderedContent(): string
    {
        return $this->rendered ?? '';
    }

    /**
     * Конвертирует контент в строку в зависимости от состояния контента.
     */
    public function __toString(): string
    {
        return $this->rendered ?: $this->source ?? '';
    }
}
