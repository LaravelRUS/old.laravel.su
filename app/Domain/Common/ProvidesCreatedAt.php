<?php

declare(strict_types=1);

namespace App\Domain\Common;

use Carbon\CarbonInterface;

interface ProvidesCreatedAt
{
    /**
     * @return CarbonInterface
     */
    public function createdAt(): CarbonInterface;
}
