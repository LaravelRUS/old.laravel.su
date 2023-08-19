<?php

declare(strict_types=1);

namespace App\Domain\Documentation;

interface VersionProviderInterface
{
    public function getVersion(): Version;
}
