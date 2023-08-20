<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Documentation\Documentation;
use App\Domain\Documentation\DocumentationRepositoryInterface;
use App\Domain\Version\Version;
use Doctrine\ORM\EntityManagerInterface;
use Happyr\DoctrineSpecification\Spec;

/**
 * @template-extends DatabaseRepository<Documentation>
 */
class DocumentationDatabaseRepository extends DatabaseRepository implements DocumentationRepositoryInterface
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Documentation::class);
    }

    /**
     * @param non-empty-string $urn
     */
    public function findByVersionAndUrn(Version $version, string $urn): ?Documentation
    {
        if ($urn === '') {
            return null;
        }

        return $this->matchOneOrNullResult(Spec::andX(
            Spec::eq('version', $version),
            Spec::eq('urn', \strtolower($urn))
        ));
    }
}
