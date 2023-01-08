<?php

declare(strict_types=1);

namespace App\Entity\Repository;

use App\Entity\Version;
use Happyr\DoctrineSpecification\Exception\NoResultException;
use Happyr\DoctrineSpecification\Spec;
use Happyr\DoctrineSpecification\Specification\Specification;
use Illuminate\Support\Collection;

/**
 * @template-extends Repository<Version>
 */
class VersionsRepository extends Repository
{
    /**
     * {@inheritDoc}
     */
    public function all(): Collection
    {
        return Collection::make($this->match(
            Spec::orderBy('name', 'desc')
        ));
    }

    /**
     * @return Version
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
     * @return Version|null
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
     * @param non-empty-string $name
     * @return Version
     */
    public function findByNameOrNew(string $name): Version
    {
        return $this->findByName($name) ?? new Version($name);
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
