<?php

namespace App\Console\Commands;

use App\Achievements\Contents\AuthorInteraction;
use App\Achievements\Contents\RecognizedAuthor;
use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;

class UpdateAchievementsForPostWithLikes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:achievements-post-likers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update achievements for authors based on the likes on their posts.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Post::with(['author'])
            ->has('likers', '>=', 10)
            ->withCount('likers')
            ->where('created_at', '>=', now()->subWeek())
            ->chunk(100, function (Collection $posts) {
                $posts->each(function (Post $post) {
                    if ($post->likers_count >= 30) {
                        $post->author->reward(RecognizedAuthor::class);
                    }

                    $post->author->reward(AuthorInteraction::class);
                });
            });
    }
}
