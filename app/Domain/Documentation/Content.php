<?php

declare(strict_types=1);

namespace App\Domain\Documentation;

use App\ContentRenderer\ContentRendererInterface;

abstract class Content
{
    protected ?string $source = null;
    protected ?string $rendered = null;

    public function clear(): void
    {
        $this->rendered = null;
    }

    public function renderWithVersion(Version $version, ContentRendererInterface $renderer): self
    {
        if ($this->source !== null) {
            $rendered = \str_replace('{{version}}', $version->name, $this->source);

            $this->rendered = (string)$renderer->render($rendered);
        }

        return $this;
    }

    public function renderUsing(ContentRendererInterface $renderer): self
    {
        if ($this->source !== null) {
            $this->rendered = (string)$renderer->render($this->source);
        }

        return $this;
    }

    public function isRendered(): bool
    {
        return $this->rendered !== null;
    }

    public function __toString(): string
    {
        return $this->rendered ?: $this->source ?? '';
    }
}
