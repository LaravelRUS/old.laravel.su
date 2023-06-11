<?php

declare(strict_types=1);

namespace App\Domain\Documentation;

interface VersionProviderInterface
{
    /**
     * @return Version
     */
    public function getVersion(): Version;
}
