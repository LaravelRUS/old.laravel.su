<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity\Repository;

use App\Entity\Version;
use Happyr\DoctrineSpecification\Exception\NoResultException;
use Happyr\DoctrineSpecification\Logic\AndX;
use Happyr\DoctrineSpecification\Spec;
use Illuminate\Support\Collection;

/**
 * Class VersionsRepository
 */
class VersionsRepository extends Repository
{
    /**
     * @return Collection|Version[]
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
     * @return Collection|Version[]
     */
    public function documented(): Collection
    {
        return Collection::make($this->match(
            $this->lastDocumentedSpec()
        ));
    }

    /**
     * @param string $name
     * @return Version|null
     */
    public function findByName(string $name): ?Version
    {
        try {
            return $this->matchOneOrNullResult(
                Spec::eq('name', $name)
            );
        } catch (NoResultException $e) {
            return null;
        }
    }

    /**
     * @param string $name
     * @return Version
     */
    public function findByNameOrNew(string $name): Version
    {
        return $this->findByName($name) ?? new Version($name);
    }

    /**
     * @return AndX
     */
    private function lastDocumentedSpec(): AndX
    {
        return Spec::andX(
            Spec::orderBy('name', 'desc'),
            Spec::eq('isDocumented', true)
        );
    }
}
