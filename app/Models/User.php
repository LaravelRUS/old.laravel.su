<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Overtrue\LaravelLike\Traits\Liker;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Liker;

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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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

}
