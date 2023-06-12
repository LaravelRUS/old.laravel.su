<?php

declare(strict_types=1);

namespace App\Domain\Shared;

/**
 * @psalm-consistent-constructor
 */
abstract readonly class StringIdentifier implements IdentifierInterface
{
    /**
     * @var non-empty-string
     */
    protected string $value;

    /**
     * @param non-empty-string|\Stringable $value
     */
    public function __construct(string|\Stringable $value)
    {
        $this->value = (string)$value;

        assert($this->value !== '', new \InvalidArgumentException('$value cannot be empty'));
    }

    public function equals(ValueObjectInterface $object): bool
    {
        return $object === $this || ($object instanceof static && $object->value === $this->value);
    }

    /**
     * @return non-empty-string
     */
    public function toString(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
