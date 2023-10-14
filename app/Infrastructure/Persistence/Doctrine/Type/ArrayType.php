<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

/**
 * @template TValue
 */
abstract class ArrayType extends Type
{
    /**
     * @param iterable<TValue|null> $value
     *
     * @return non-empty-string|null
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): string|null
    {
        if ($value === null) {
            return null;
        }

        $result = [];

        foreach ($value as $item) {
            $result[] = $this->pack($item);
        }

        return '{' . \implode(',', $result) . '}';
    }

    /**
     * @param TValue $value
     */
    abstract protected function pack(mixed $value): string;

    /**
     * @param non-empty-string $value
     *
     * @return list<TValue|null>|null
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): ?array
    {
        if ($value === null) {
            return null;
        }

        if ($value === '{}') {
            return [];
        }

        $result = [];

        foreach (\explode(',', \trim($value, '{}')) as $value) {
            $result[] = $this->unpack($value);
        }

        return $result;
    }

    /**
     * @return TValue
     */
    abstract protected function unpack(string $value): mixed;
}
