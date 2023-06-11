<?php

declare(strict_types=1);

namespace App\Domain\Article;

use App\ContentRenderer\ContentRendererInterface;

final class Body
{
    protected ?string $source = null;
    protected ?string $rendered = null;

    public function clear(): void
    {
        $this->rendered = null;
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
