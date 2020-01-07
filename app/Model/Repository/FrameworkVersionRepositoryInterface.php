<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Model\Repository;

use App\Model\FrameworkVersion;
use Illuminate\Support\Collection;

/**
 * Interface FrameworkVersionRepositoryInterface
 */
interface FrameworkVersionRepositoryInterface
{
    /**
     * @return Collection|FrameworkVersion[]
     */
    public function all(): Collection;

    /**
     * @return FrameworkVersion
     */
    public function last(): FrameworkVersion;

    /**
     * @param string $title
     * @return FrameworkVersion|null
     */
    public function findByTitle(string $title): ?FrameworkVersion;

    /**
     * @param string $title
     * @return bool
     */
    public function isDocumented(string $title): bool;
}
