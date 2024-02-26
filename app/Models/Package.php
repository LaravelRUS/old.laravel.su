<?php

namespace App\Models;

use App\Casts\PackageTypeEnum;
use App\Models\Concerns\LogsActivityFillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;

class Package extends Model
{
    use AsSource, Chartable, Filterable, HasFactory, LogsActivityFillable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'packagist_name',
        'website',
        'type',
        'downloads',
        'stars',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'name'           => 'string',
        'description'    => 'string',
        'packagist_name' => 'string',
        'website'        => 'string',
        'type'           => PackageTypeEnum::class,
    ];

    /**
     * The default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'approved' => 0,
    ];

    /**
     * The allowed filters for the model.
     *
     * @var array
     */
    protected $allowedFilters = [
        'name'           => Like::class,
        'description'    => Like::class,
        'packagist_name' => Like::class,
        'website'        => Like::class,
    ];

    /**
     * The allowed sorts for the model.
     *
     * @var array
     */
    protected $allowedSorts = [
        'name',
        'created_at',
        'updated_at',
        'stars',
        'approved',
    ];

    /**
     * Get the author of the package.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Scope a query to only include approved packages.
     *
     * @param Builder $query
     * @param bool    $approved
     *
     * @return Builder
     */
    public function scopeApproved(Builder $query, bool $approved = true): Builder
    {
        return $query->where('approved', $approved);
    }
}
