<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Happyr\DoctrineSpecification\EntitySpecificationRepositoryTrait;
use Illuminate\Support\Collection;

/**
 * @template T
 * @template-extends EntityRepository<T>
 */
abstract class Repository extends EntityRepository
{
    use EntitySpecificationRepositoryTrait;

    /**
     * @return Collection<array-key, T>
     */
    public function all(): Collection
    {
        return Collection::make($this->findAll());
    }
}
