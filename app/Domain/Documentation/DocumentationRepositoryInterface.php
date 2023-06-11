<?php

declare(strict_types=1);

namespace App\Domain\Documentation;

interface DocumentationRepositoryInterface
{
    /**
     * @param non-empty-string $urn
     */
    public function findByVersionAndUrn(Version $version, string $urn): ?Documentation;
}
