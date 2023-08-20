<?php

declare(strict_types=1);

namespace App\Domain\Documentation;

use App\Domain\Version\Version;

interface DocumentationRepositoryInterface
{
    /**
     * @param non-empty-string $urn
     */
    public function findByVersionAndUrn(Version $version, string $urn): ?Documentation;
}
