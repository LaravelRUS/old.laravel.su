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
     * @var array<non-empty-string, RendererResolver>
     */
    private array $registered = [];

    /**
     * @var array<non-empty-string, ContentRendererInterface>
     */
    private array $resolved = [];

    /**
     * @param ContentRendererInterface $default
     */
    public function __construct(
        private readonly ContentRendererInterface $default,
    ) {
    }

    /**
     * @param Type $type
     * @param RendererResolver $resolver
     * @return $this
     */
    public function extend(Type $type, callable $resolver): self
    {
        $this->registered[$type->name] = $resolver;

        return $this;
    }

    /**
     * @param Type|null $type
     * @return ContentRendererInterface
     */
    private function resolve(?Type $type): ContentRendererInterface
    {
        if (isset($this->registered[$type->name])) {
            return $this->registered[$type->name]();
        }

        return $this->default;
    }

    /**
     * {@inheritDoc}
     */
    public function create(Type $type = null): ContentRendererInterface
    {
        if ($type === null) {
            return $this->default;
        }

        return $this->resolved[$type->name] ??= $this->resolve($type);
    }
}
