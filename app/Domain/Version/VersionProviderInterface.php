<?php

declare(strict_types=1);

namespace App\Domain\Version;

interface VersionProviderInterface
{
    public function getVersion(): Version;
}
