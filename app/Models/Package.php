<?php

namespace App\Models;

use App\Casts\PackageTypeEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Package extends Model
{
    use HasFactory, AsSource, Filterable;

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'packagist_name',
        'website',
        'type',
        'downloads',
        'stars',
        'approved',
    ];

    /**
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get only posts with a custom status.
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeApproved(Builder $query, bool $approved = true): Builder
    {
        return $query->where('approved', $approved);
    }
}
