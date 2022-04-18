<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\ContentRenderer;

use App\ContentRenderer\Result\Heading;

final class Result implements ResultInterface
{
    /**
     * @var array<Heading>
     */
    private readonly array $navigation;

    /**
     * @var \Traversable<Heading>|null
     */
    private ?\Traversable $initial = null;

    /**
     * @param string $content
     * @param iterable<Heading> $navigation
     */
    public function __construct(
        private readonly string $content,
        iterable $navigation,
    ) {
        if ($navigation instanceof \Traversable) {
            $this->initial = $navigation;
        } else {
            $this->navigation = $navigation;
        }
    }

    /**
     * @return iterable<Heading>
     */
    public function getHeadings(): iterable
    {
        if ($this->initial !== null) {
            $this->navigation = \iterator_to_array($this->initial, false);
            $this->initial = null;
        }

        return $this->navigation;
    }

    /**
     * {@inheritDoc}
     */
    public function getContents(): string
    {
        return $this->content;
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return $this->getContents();
    }
}
