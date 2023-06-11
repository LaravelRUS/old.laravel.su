<?php

declare(strict_types=1);

namespace App\Domain\Shared;

use Ramsey\Uuid\Uuid;

readonly class UuidIdentifier implements IdentifierInterface
{
    /**
     * @var non-empty-string
     */
    private string $value;

    /**
     * @param non-empty-string|\Stringable $scalar
     */
    final public function __construct(string|\Stringable $scalar)
    {
        $this->value = (string)$scalar;
    }

    /**
     * @param non-empty-string|null $namespace
     */
    public static function new(string $namespace = null): static
    {
        if ($namespace) {
            return static::fromNamespace($namespace);
        }

        return new static(Uuid::uuid4());
    }

    /**
     * @param non-empty-string $namespace
     */
    public static function fromNamespace(string $namespace): static
    {
        return new static(Uuid::uuid5(Uuid::uuid4(), $namespace));
    }

    /**
     * @param non-empty-string $value
     */
    public static function fromString(string $value): static
    {
        return new static(Uuid::fromString($value));
    }

    public static function nil(): static
    {
        return new static(Uuid::NIL);
    }

    public static function max(): static
    {
        return new static(Uuid::MAX);
    }

    public function equals(ValueObjectInterface $object): bool
    {
        return $object === $this || ($object instanceof self && $object->value === $this->value);
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
