<?php

declare(strict_types=1);

namespace App\Entity\Common;

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
