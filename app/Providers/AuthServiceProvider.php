<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\ChallengeApplication;
use App\Models\Comment;
use App\Models\IdeaKey;
use App\Models\Meet;
use App\Models\Package;
use App\Models\Position;
use App\Models\Post;
use App\Policies\ChallengeApplicationPolicy;
use App\Policies\CommentPolicy;
use App\Policies\IdeaKeyPolicy;
use App\Policies\MeetPolicy;
use App\Policies\PackagePolicy;
use App\Policies\PositionPolicy;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Comment::class              => CommentPolicy::class,
        Meet::class                 => MeetPolicy::class,
        Post::class                 => PostPolicy::class,
        Package::class              => PackagePolicy::class,
        Position::class             => PositionPolicy::class,
        IdeaKey::class              => IdeaKeyPolicy::class,
        ChallengeApplication::class => ChallengeApplicationPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
