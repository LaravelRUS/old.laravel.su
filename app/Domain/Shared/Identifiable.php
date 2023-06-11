<?php

declare(strict_types=1);

namespace App\Domain\Shared;

/**
 * @deprecated Please use {@see IdentifiableInterface} interface instead.
 */
interface Identifiable
{
    /**
     * @return bool
     */
    public function isNew(): bool;

    /**
     * @return int|null
     */
    public function getId(): ?int;
}
