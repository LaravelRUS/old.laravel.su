<?php

namespace App\Console\Commands;

use App\Achievements\Contents\AuthorCommentInteraction;
use App\Achievements\Contents\AuthorHighCommentInteraction;
use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;

class UpdateAchievementsForPostWithComments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:achievements-post-comments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update achievements for authors based on the comments on their posts.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Post::with(['author'])
            ->has('comments', '>=', 10)
            ->withCount('comments')
            ->where('created_at', '>=', now()->subWeek())
            ->chunk(100, function (Collection $posts) {
                $posts->each(function (Post $post) {
                    if ($post->comments_count >= 30) {
                        $post->author->reward(AuthorHighCommentInteraction::class);
                    }

                    $post->author->reward(AuthorCommentInteraction::class);
                });
            });
    }
}
