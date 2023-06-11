<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Type;

use App\Domain\Documentation\DocumentationId;

/**
 * @template-extends UuidType<DocumentationId>
 */
final class DocumentationIdType extends UuidType
{
    protected static function getClass(): string
    {
        return DocumentationId::class;
    }
}
