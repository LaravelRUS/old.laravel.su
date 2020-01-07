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
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Documentation
 */
class Documentation extends Model
{
    /**
     * @var string
     */
    protected $table = 'docs';

    /**
     * @var array|string[]
     */
    protected $guarded = [];

    /**
     * @var array|string[]
     */
    protected $dates = [
        'last_commit_at',
        'last_original_commit_at',
        'current_original_commit_at'
    ];

    /**
     * @param Builder $query
     * @param mixed $version
     * @return Builder
     */
    public function scopeByVersion(Builder $query, $version): Builder
    {
        if ($version instanceof FrameworkVersion) {
            return $query->where('version_id', $version->id); // Тут объект?
        }

        return $query->whereHas('version', static function (Builder $q) use ($version) {
            return $q->where('title', $version); // А тут скаляр?
        });
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOrderByLastCommit(Builder $query): Builder
    {
        return $query->orderBy('last_commit_at', 'desc');
    }

    /**
     * @param Builder $query
     * @param $pageTitle
     * @return Builder
     */
    public function scopePage(Builder $query, $pageTitle): Builder
    {
        return $query->where('page', $pageTitle);
    }

    /**
     * @return BelongsTo
     */
    public function version(): BelongsTo
    {
        return $this->belongsTo(FrameworkVersion::class, 'version_id');
    }
}
