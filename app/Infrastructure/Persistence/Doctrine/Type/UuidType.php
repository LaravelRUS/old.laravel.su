<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Type;

use App\Domain\Shared\UuidIdentifier;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

/**
 * @template TValueObject of UuidIdentifier
 */
abstract class UuidType extends Type
{
    /**
     * @return non-empty-string
     */
    public function getName(): string
    {
        return static::getClass();
    }

    /**
     * @return class-string<TValueObject>
     */
    abstract protected static function getClass(): string;

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return 'UUID';
    }

    /**
     * @param TValueObject $value
     *
     * @return non-empty-string|null
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): string|null
    {
        if (\is_string($value) || $value instanceof \Stringable) {
            return (string)$value;
        }

        return null;
    }

    /**
     * @param non-empty-string|null $value
     *
     * @return TValueObject|null
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): ?UuidIdentifier
    {
        if ($value === null) {
            return null;
        }

        $class = static::getClass();

        return new $class($value);
    }
}
