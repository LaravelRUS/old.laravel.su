<?php

namespace App\Models;

use App\Models\Concerns\Approvable;
use App\Models\Concerns\HasAuthor;
use App\Models\Concerns\LogsActivityFillable;
use App\Models\Enums\PackageTypeEnum;
use App\Models\Presenters\PackagePresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;

class Package extends Model
{
    use Approvable, AsSource, Chartable, Filterable, HasAuthor, HasFactory, LogsActivityFillable;

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
     * @return \App\Models\Presenters\PackagePresenter
     */
    public function presenter()
    {
        return new PackagePresenter($this);
    }
}
