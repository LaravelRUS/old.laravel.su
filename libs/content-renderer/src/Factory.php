<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\ContentRenderer;

/**
 * @psalm-type RendererResolver = callable():ContentRendererInterface
 */
final class Factory implements FactoryInterface
{
    /**
     * @var array<non-empty-string, ContentRendererInterface>
     */
    private array $renderers = [];

    /**
     * @param ContentRendererInterface $default
     * @param iterable<Type, ContentRendererInterface> $renderers
     */
    public function __construct(
        private readonly ContentRendererInterface $default,
        iterable $renderers = [],
    ) {
        foreach ($renderers as $type => $renderer) {
            $this->renderers[$type->name] = $renderer;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function create(Type $type = null): ContentRendererInterface
    {
        if ($type === null) {
            return $this->default;
        }

        return $this->renderers[$type->name] ??= $this->default;
    }
}
