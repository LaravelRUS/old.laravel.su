<?php

namespace App\Models;

use App\Models\Presenters\UserPresenter;
use App\Notifications\GreetNotification;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use Laravel\Sanctum\HasApiTokens;
use NotificationChannels\WebPush\HasPushSubscriptions;
use Orchid\Access\UserAccess;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Filters\Types\WhereDateStartEnd;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;
use Orchid\Support\Facades\Dashboard;
use Overtrue\LaravelLike\Traits\Liker;

class User extends Authenticatable
{
    use AsSource, Chartable, Filterable, HasApiTokens, HasFactory, HasPushSubscriptions, Liker, Notifiable, UserAccess;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'avatar',
        'nickname',
        'github_id',
        'about',
        'github_name',
        'github_bio',
        'selected_achievement',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
        'github_id',
        'permissions',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'permissions' => 'array',
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
        'id'         => Where::class,
        'name'       => Like::class,
        'email'      => Like::class,
        'nickname'   => Like::class,
        'updated_at' => WhereDateStartEnd::class,
        'created_at' => WhereDateStartEnd::class,
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'name',
        'email',
        'updated_at',
        'created_at',
    ];

    /**
     * Boot the model's events.
     *
     * @return void
     */
    protected static function booted(): void
    {
        static::created(function (User $user) {
            Notification::send($user, new GreetNotification());
        });
    }

    /**
     * Throw an exception if email already exists, create admin user.
     *
     * @throws \Throwable
     */
    public static function createAdmin(string $name, string $email, string $password): void
    {
        throw_if(static::where('email', $email)->exists(), 'User exists');

        static::create([
            'name'        => $name,
            'email'       => $email,
            'permissions' => Dashboard::getAllowAllPermission(),
        ]);
    }

    /**
     * @return UserPresenter
     */
    public function presenter()
    {
        return new UserPresenter($this);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return $this
     */
    public function gatNameAttribute(): static
    {
        return $this->name ?? $this->github_name ?? 'Unknown';
    }

    /**
     * Returns all comments that this user has made.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Returns all packages that this user has made.
     */
    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    /**
     * Returns all codeSnippets that this user has made.
     */
    public function codeSnippets()
    {
        return $this->hasMany(CodeSnippet::class);
    }

    /**
     * Returns only approved comments that this user has made.
     */
    public function approvedComments()
    {
        return $this->morphMany(Comment::class, 'commenter')->where('approved', true);
    }

    public function meets()
    {
        return $this->hasMany(Meet::class);
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    /**
     * Define the "achievements" relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function achievements()
    {
        return $this->hasMany(Achievement::class);
    }

    /**
     * Define the "achievements" relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function challengesReapositories()
    {
        return $this->hasMany(ChallengeApplication::class);
    }

    /**
     * Reward the user with an achievement.
     *
     * @param string $type
     *
     * @return \App\Models\Achievement
     */
    public function reward(string $type): Achievement
    {
        $exist = $this->achievements()->get()->where('achievement_type', $type);

        if ($exist->isNotEmpty()) {
            return $exist->first();
        }

        return $this->achievements()->create([
            'achievement_type' => $type,
        ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function milestone(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->selected_achievement === null) {
                    return null;
                }

                try {
                    return app($this->selected_achievement);
                } catch (\Throwable) {
                    return null;
                }
            },
        );
    }
}
