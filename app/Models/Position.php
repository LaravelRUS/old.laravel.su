<?php

namespace App\Models;

use App\Casts\ScheduleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Position extends Model
{
    use HasFactory;

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
        'experience',
        'address',
        'schedule',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'title'           => 'string',
        'description'    => 'string',
        'organization' => 'string',
        'address'        => 'string',
        'schedule'           => ScheduleEnum::class,
    ];



    public static function boot()
    {
        parent::boot();

        static::creating(function ($position) {
            $slug = Str::slug($position->organization);
            $i = 1;

            while (static::where('slug', $slug)->exists()) {
                $slug = Str::slug($position->organization) . '-' . $i++;
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
}
