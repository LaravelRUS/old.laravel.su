<?php

namespace App\Models;

use App\Models\Presenters\AchievementPresenter;
use App\Notifications\AchievementNotification;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;

class Achievement extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'achievement_type',
        'user_id',
    ];

    /**
     * Boot the model's events.
     *
     * @return void
     */
    protected static function booted(): void
    {
        // Send notification when a new achievement is created
        static::created(function (Achievement $achievement) {
            Notification::send($achievement->user, new AchievementNotification($achievement));
        });
    }

    /**
     * Get the user that owns the achievement.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the presenter instance for the achievement.
     *
     * @return \App\Models\Presenters\AchievementPresenter
     */
    public function presenter(): AchievementPresenter
    {
        return new AchievementPresenter(app($this->achievement_type));
    }
}
