<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Happyr\DoctrineSpecification\Repository\EntitySpecificationRepositoryTrait;
use Illuminate\Support\Collection;

/**
 * @template T of object
 * @template-extends EntityRepository<T>
 */
abstract class DatabaseRepository extends EntityRepository
{
    use EntitySpecificationRepositoryTrait;

    /**
     * @param class-string<T> $class
     */
    public function __construct(EntityManagerInterface $em, string $class)
    {
        parent::__construct($em, $em->getClassMetadata($class));
    }

    /**
     * @return Collection<array-key, T>
     *
     * @psalm-suppress all
     */
    public function all(): Collection
    {
        return Collection::make($this->findAll());
    }
}
