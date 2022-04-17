<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity\Origin\Version;

use App\Entity\Origin;
use App\Entity\Origin\Version;

/**
 * @template T of Origin
 */
interface VersionsRepositoryInterface
{
    /**
     * @param T $origin
     * @return list<Version>
     */
    public function findAllByRepository(Origin $origin): iterable;

    /**
     * @param T $origin
     * @param non-empty-string $name
     * @return Version|null
     */
    public function findByName(Origin $origin, string $name): ?Version;
}
