<?php

namespace App\Models;

use App\Models\Concerns\LogsActivityFillable;
use App\Presenters\ChallengePresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;

class Challenge extends Model
{
    use AsSource, Chartable, Filterable, HasFactory, LogsActivityFillable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'subject',
        'start_date',
        'stop__date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'datetime',
        'stop_date'  => 'datetime',
    ];


    /**
     * The allowed filters for the model.
     *
     * @var array
     */
    protected $allowedFilters = [
        'title'        => Like::class,
        'description' => Like::class,
        'subject'    => Like::class,
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
        'start_date',
        'stop_date',
    ];


    public function repositories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ChallengesReporitories::class);
    }

    public static function active()
    {
        return static::where('stop_date','>=',now())->latest()
            ->first();
    }

    public function isNotStarted(): bool
    {
        return $this->start_date > now() && $this->stop_date > now();
    }

    /**
     * @return ChallengePresenter
     */
    public function presenter()
    {
        return new ChallengePresenter($this);
    }

}
