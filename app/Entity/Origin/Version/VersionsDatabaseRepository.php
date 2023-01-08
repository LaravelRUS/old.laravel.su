<?php

declare(strict_types=1);

namespace App\Entity\Origin\Version;

use App\Entity\Common\Repository;
use App\Entity\Origin;
use App\Entity\Origin\Version;
use Happyr\DoctrineSpecification\Spec;

/**
 * @template-extends Repository<Version>
 * @template-implements VersionsRepositoryInterface<Origin>
 */
class VersionsDatabaseRepository extends Repository implements VersionsRepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function findAllByRepository(Origin $origin): iterable
    {
        return $this->match(Spec::eq('origin', $origin));
    }

    /**
     * {@inheritDoc}
     */
    public function findByName(Origin $origin, string $name): ?Version
    {
        return $this->matchOneOrNullResult(Spec::andX(
            Spec::eq('origin', $origin),
            Spec::eq('name', $name)
        ));
    }
}
