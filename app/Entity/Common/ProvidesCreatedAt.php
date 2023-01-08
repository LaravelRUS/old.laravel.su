<?php

declare(strict_types=1);

namespace App\Entity\Common;

use Carbon\CarbonInterface;

interface ProvidesCreatedAt
{
    /**
     * @return CarbonInterface
     */
    public function createdAt(): CarbonInterface;
}
