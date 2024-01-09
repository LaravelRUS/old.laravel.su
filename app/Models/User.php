<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Orchid\Presenters\UserPresenter;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
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
    use HasApiTokens, HasFactory, Notifiable, Liker, AsSource, Chartable, Filterable, UserAccess;

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
        'github_bio'
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
        'permissions'          => 'array',
        'email_verified_at'    => 'datetime',
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

}
