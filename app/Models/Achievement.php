<?php

namespace App\Models;

use App\Orchid\Presenters\AchievementPresenter;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
