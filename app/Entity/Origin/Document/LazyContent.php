<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
