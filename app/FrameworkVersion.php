<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * Class FrameworkVersion
 */
class FrameworkVersion extends Model
{
    /**
     * @var string
     */
    protected $table = 'versions';

    /**
     * @var array|string[]
     */
    protected $fillable = [
        'title',
        'is_documented',
    ];

    /**
     * @param Builder $query
     * @param mixed $version
     * @return Builder
     */
    public function scopeVersion(Builder $query, $version): Builder
    {
        return $query->where('title', $version);
    }

    /**
     * @return HasMany
     */
    public function documentation(): HasMany
    {
        return $this->hasMany(Documentation::class, 'version_id');
    }

    /**
     * @return Collection|FrameworkVersion[]
     */
    public static function documentedVersions(): Collection
    {
        return static::query()
            ->where('is_documented', 1)
            ->orderBy('title', 'desc')
            ->get();
    }

}
