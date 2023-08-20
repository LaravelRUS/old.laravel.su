<?php

declare(strict_types=1);

namespace App\Domain\Version;

use Happyr\DoctrineSpecification\Exception\NoResultException;

interface VersionRepositoryInterface
{
    /**
     * @return iterable<array-key, Version>
     */
    public function all(): iterable;

    /**
     * @throws NoResultException
     */
    public function last(): Version;

    /**
     * @return iterable<array-key, Version>
     */
    public function documented(): iterable;

    /**
     * @param non-empty-string $name
     */
    public function findByName(string $name): ?Version;
}
