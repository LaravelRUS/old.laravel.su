<?php

declare(strict_types=1);

namespace App\Entity\Origin\Version;

use App\Entity\Repository\Repository;
use App\Entity\Origin\OriginRepository;
use App\Entity\Origin\Version;
use Happyr\DoctrineSpecification\Spec;

/**
 * @template-extends Repository<Version>
 * @template-implements VersionsRepositoryInterface<OriginRepository>
 */
class VersionsDatabaseRepository extends Repository implements VersionsRepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function findAllByRepository(OriginRepository $origin): iterable
    {
        return $this->match(Spec::eq('origin', $origin));
    }

    /**
     * {@inheritDoc}
     */
    public function findByName(OriginRepository $origin, string $name): ?Version
    {
        return $this->matchOneOrNullResult(Spec::andX(
            Spec::eq('origin', $origin),
            Spec::eq('name', $name)
        ));
    }
}
