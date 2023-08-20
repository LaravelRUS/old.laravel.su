<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Version\Version;
use App\Domain\Version\VersionRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Happyr\DoctrineSpecification\Exception\NoResultException;
use Happyr\DoctrineSpecification\Spec;
use Happyr\DoctrineSpecification\Specification\Specification;
use Illuminate\Support\Collection;

/**
 * @template-extends DatabaseRepository<Version>
 */
class VersionDatabaseRepository extends DatabaseRepository implements VersionRepositoryInterface
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Version::class);
    }

    /**
     * @return Collection<array-key, Version>
     */
    public function all(): Collection
    {
        return Collection::make($this->match(
            Spec::orderBy('name', 'desc')
        ));
    }

    /**
     * @throws NoResultException
     */
    public function last(): Version
    {
        return $this->matchSingleResult(
            Spec::andX(
                $this->lastDocumentedSpec(),
                Spec::limit(1)
            )
        );
    }

    /**
     * @return Collection<array-key, Version>
     */
    public function documented(): Collection
    {
        return Collection::make($this->match(
            $this->lastDocumentedSpec()
        ));
    }

    /**
     * @param non-empty-string $name
     */
    public function findByName(string $name): ?Version
    {
        try {
            return $this->matchOneOrNullResult(
                Spec::eq('name', $name)
            );
        } catch (NoResultException) {
            return null;
        }
    }

    /**
     * @return Specification
     */
    private function lastDocumentedSpec(): Specification
    {
        return Spec::andX(
            Spec::orderBy('name', 'desc'),
            Spec::eq('isDocumented', true)
        );
    }
}
