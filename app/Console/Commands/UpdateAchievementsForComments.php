<?php

namespace App\Console\Commands;

use App\Achievements\Contents\CommentInteraction;
use App\Achievements\Contents\HighCommentInteraction;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class UpdateAchievementsForComments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:achievements-commenter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        User::whereHas('comments', function (Builder $query) {
            $query->where('created_at', '>=', now()->subWeek());
        }, '>=', 10)
            ->withCount('comments')
            ->chunk(100, function (Collection $users) {
                $users->each(function (User $user) {
                    if ($user->comments_count >= 30) {
                        $user->reward(HighCommentInteraction::class);
                    } else {
                        $user->reward(CommentInteraction::class);
                    }
                });
            });
    }
}
