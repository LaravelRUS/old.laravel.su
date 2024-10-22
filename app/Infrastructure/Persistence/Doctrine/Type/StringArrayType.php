<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;

/**
 * @template-extends ArrayType<string|null>
 */
class StringArrayType extends ArrayType
{
    /**
     * @return non-empty-string
     */
    public function getName(): string
    {
        return 'string[]';
    }

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return 'VARCHAR(' . ($column['length'] ?? 255) . ')[]';
    }

    protected function pack(mixed $value): string
    {
        return match (true) {
            $value === null => 'NULL',
            $value === '' => '""',
            default => '"' . \addcslashes($value, '"') . '"',
        };
    }

    protected function unpack(string $value): ?string
    {
        $value = \stripcslashes($value);

        if ($value === 'NULL') {
            return null;
        }

        return $value;
    }
}
