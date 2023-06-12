<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Type;

use App\Domain\Documentation\TranslationVersionId;

/**
 * @template-extends GitObjectType<TranslationVersionId>
 */
final class TranslationVersionIdType extends GitObjectType
{
    protected static function getClass(): string
    {
        return TranslationVersionId::class;
    }
}
