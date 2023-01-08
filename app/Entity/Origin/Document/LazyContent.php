<?php

declare(strict_types=1);

namespace App\Entity\Origin\Document;

class LazyContent implements \Stringable
{
    /**
     * @param \Closure(): string $placeholder
     */
    public function __construct(
        private readonly \Closure $placeholder,
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return ($this->placeholder)();
    }
}
