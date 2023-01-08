<?php

declare(strict_types=1);

namespace App\Entity\Origin\Version;

use App\Entity\Origin\OriginRepository;
use App\Entity\Origin\Version;

/**
 * @template T of OriginRepository
 */
interface VersionsRepositoryInterface
{
    /**
     * @param T $origin
     * @return list<Version>
     */
    public function findAllByRepository(OriginRepository $origin): iterable;

    /**
     * @param T $origin
     * @param non-empty-string $name
     * @return Version|null
     */
    public function findByName(OriginRepository $origin, string $name): ?Version;
}
