<?php

declare(strict_types=1);

namespace App\ContentRenderer\Result;

final class Heading implements \Stringable
{
    /**
     * @param string $text
     * @param positive-int $level
     */
    public function __construct(
        public readonly string $text,
        public readonly int $level,
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return $this->text;
    }
}
