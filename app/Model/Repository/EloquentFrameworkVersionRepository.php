<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @noinspection StaticInvocationViaThisInspection
 */

declare(strict_types=1);

namespace App\Model\Repository;

use App\Model\FrameworkVersion;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * @method Builder|FrameworkVersion query()
 */
final class EloquentFrameworkVersionRepository extends Repository implements FrameworkVersionRepositoryInterface
{
    /**
     * @var Collection|null
     */
    private ?Collection $all = null;

    /**
     * {@inheritDoc}
     */
    public function all(): Collection
    {
        if ($this->all === null) {
            $this->all = $this->query()
                ->actual()
                ->documented()
                ->latest()
                ->get();
        }

        return $this->all;
    }

    /**
     * @return FrameworkVersion|Model
     */
    public function last(): FrameworkVersion
    {
        return $this->query()
            ->actual()
            ->documented()
            ->first();
    }

    /**
     * @param string $title
     * @return FrameworkVersion|Model|null
     */
    public function findByTitle(string $title): ?FrameworkVersion
    {
        return $this->query()
            ->where('title', $title)
            ->first();
    }

    /**
     * @param string $title
     * @return bool
     */
    public function isDocumented(string $title): bool
    {
        $version = $this->query()
            ->where('title', $title)
            ->first();

        if (! $version) {
            return false;
        }

        return (bool)$version->is_documented;
    }
}
