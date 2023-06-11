<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Documentation;
use App\Domain\Version;
use Happyr\DoctrineSpecification\Spec;

/**
 * @template-extends Repository<Documentation>
 */
class DocumentationRepository extends Repository
{
    /**
     * @param Version $version
     * @param non-empty-string $urn
     * @return Documentation|null
     */
    public function findByVersionAndUrn(Version $version, string $urn): ?Documentation
    {
        return $this->matchOneOrNullResult(Spec::andX(
            Spec::eq('version', $version),
            Spec::eq('urn', \strtolower($urn))
        ));
    }
}
