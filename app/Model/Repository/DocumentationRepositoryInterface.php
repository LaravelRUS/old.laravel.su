<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Model\Repository;

use App\Model\Documentation;
use App\Model\FrameworkVersion;

/**
 * Interface DocumentationRepositoryInterface
 */
interface DocumentationRepositoryInterface
{
    /**
     * @param FrameworkVersion $version
     * @return Documentation|null
     */
    public function findMenu(FrameworkVersion $version): ?Documentation;

    /**
     * @param FrameworkVersion $version
     * @param string $page
     * @return Documentation|null
     */
    public function findByName(FrameworkVersion $version, string $page): ?Documentation;
}
