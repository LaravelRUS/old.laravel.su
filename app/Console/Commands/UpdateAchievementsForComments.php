<?php

namespace App\Console\Commands;

use App\Achievements\DiscussionStar;
use App\Achievements\MasterOfDiscussions;
use App\Achievements\PricelessCommentator;
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
    protected $signature = 'app:update-achievements';

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
                    if ($user->comments_count >= 50) {
                        $user->reward(DiscussionStar::class);
                    } elseif ($user->comments_count >= 30) {
                        $user->reward(MasterOfDiscussions::class);
                    } else {
                        $user->reward(PricelessCommentator::class);
                    }
                });
            });
    }
}
