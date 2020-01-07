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
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Repository
 */
class Repository
{
    /**
     * @var Builder|FrameworkVersion
     */
    private Builder $builder;

    /**
     * EloquentRepository constructor.
     *
     * @param Builder $builder
     */
    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @return Builder
     */
    protected function query(): Builder
    {
        return clone $this->builder;
    }
}
