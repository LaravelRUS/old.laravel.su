<?php

namespace App\Models;

use App\Notifications\AchievementNotification;
use App\Orchid\Presenters\AchievementPresenter;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;

class Achievement extends Model
{
    use HasFactory, HasUuids;

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'achievement_type',
        'user_id',
    ];

    protected static function booted(): void
    {
        static::created(function (Achievement $achievement) {
            Notification::send($achievement->user, new AchievementNotification($achievement));
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \App\Orchid\Presenters\AchievementPresenter
     */
    public function presenter(): AchievementPresenter
    {
        return new AchievementPresenter(app($this->achievement_type));
    }
}
