<?php

namespace App\Models;

use App\Casts\ScheduleEnum;
use App\Orchid\Presenters\PositionPresenter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;

class Position extends Model
{
    use AsSource, Chartable, Filterable, HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'organization',
        'salary_min',
        'salary_max',
        'location',
        'schedule',
        'contact',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'title'        => 'string',
        'description'  => 'string',
        'organization' => 'string',
        'location'     => 'string',
        'contact'      => 'string',
        'schedule'     => ScheduleEnum::class,
    ];

    protected $attributes = [
        'approved'       => 0,
    ];
    /**
     * @var array
     */
    protected $allowedFilters = [
        'title'        => Like::class,
        'description'  => Like::class,
        'organization' => Like::class,
        'location'     => Like::class,
        'contact'      => Like::class,
    ];

    protected $allowedSorts = [
        'title',
        'description',
        'organization',
        'salary_min',
        'salary_max',
        'location',
        'schedule',
        'contact',
        'approved',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($position) {
            $slug = Str::slug($position->organization);
            $i = 1;

            while (static::where('slug', $slug)->exists()) {
                $slug = Str::slug($position->organization).'-'.$i++;
            }

            $position->slug = $slug;
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Author relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->user();
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

    /**
     * @return \App\Orchid\Presenters\PositionPresenter
     */
    public function presenter(): PositionPresenter
    {
        return new PositionPresenter($this);
    }
}
