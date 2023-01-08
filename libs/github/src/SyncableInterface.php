<?php

declare(strict_types=1);

namespace App\GitHub;

interface SyncableInterface
{
    /**
     * @return bool
     */
    public function isSyncable(): bool;
}
