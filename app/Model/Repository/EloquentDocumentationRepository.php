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
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Builder|Documentation query()
 */
class EloquentDocumentationRepository extends Repository implements DocumentationRepositoryInterface
{
    /**
     * @param FrameworkVersion $version
     * @return Documentation|null
     */
    public function findMenu(FrameworkVersion $version): ?Documentation
    {
        return $this->findByName($version, $version->menu_page);
    }

    /**
     * @param FrameworkVersion $version
     * @param string $page
     * @return Documentation|null
     */
    public function findByName(FrameworkVersion $version, string $page): ?Documentation
    {
        return $this->query()
            ->byVersion($version)
            ->page($page)
            ->first();
    }
}
