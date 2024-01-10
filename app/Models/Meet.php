<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Screen\AsSource;

class Meet extends Model
{
    use HasFactory, AsSource, Filterable;

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'start_date',
        'location',
        'online',
        'link',
    ];

    protected $casts = [
        'start_date' => 'datetime',
    ];

    protected $attributes = [
        'approved'       => 0,
    ];

    protected $allowedFilters = [
        'name' => Like::class,
        'description' => Like::class,
        'location' => Like::class,
    ];
    /**
     * @var array
     */
    protected $allowedSorts = [
        'name',
        'created_at',
        'updated_at',
        'start_date',
        'location',
        'online',
        'approved',
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
