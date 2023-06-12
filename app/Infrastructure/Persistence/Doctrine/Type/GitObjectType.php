<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Type;

use App\Domain\Shared\GitObjectIdentifier;
use App\Domain\Shared\IdentifierInterface;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

/**
 * @template TValueObject of GitObjectIdentifier
 */
abstract class GitObjectType extends Type
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
        return 'CHAR(40)';
    }

    /**
     * @param TValueObject $value
     *
     * @return non-empty-string|null
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
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): ?GitObjectIdentifier
    {
        if ($value === null) {
            return null;
        }

        $class = static::getClass();

        return new $class($value);
    }
}
