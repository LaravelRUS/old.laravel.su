<?php

declare(strict_types=1);

namespace App\Domain\Shared;

interface IdentifiableInterface
{
    /**
     * Возвращает идентификатор объекта.
     */
    public function getId(): IdentifierInterface;
}
