<?php

namespace App\Models;

use App\Models\Concerns\Approvable;
use App\Models\Concerns\HasAuthor;
use App\Models\Concerns\LogsActivityFillable;
use App\Models\Enums\ScheduleEnum;
use App\Models\Presenters\PositionPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;

class Position extends Model
{
    use Approvable, AsSource, Chartable, Filterable, HasAuthor, HasFactory, LogsActivityFillable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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
     * The attributes that should be cast.
     *
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
        'title'        => Like::class,
        'description'  => Like::class,
        'organization' => Like::class,
        'location'     => Like::class,
        'contact'      => Like::class,
    ];

    /**
     * The allowed sorts for the model.
     *
     * @var array
     */
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

    /**
     * Boot method for model.
     */
    public static function boot(): void
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
     * Get the presenter for the model.
     *
     * @return \App\Models\Presenters\PositionPresenter
     */
    public function presenter(): PositionPresenter
    {
        return new PositionPresenter($this);
    }
}
