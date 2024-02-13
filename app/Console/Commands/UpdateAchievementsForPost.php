<?php

namespace App\Console\Commands;

use App\Achievements\Educator;
use App\Achievements\RecognizedAuthor;
use App\Achievements\Writer;
use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;

class UpdateAchievementsForPost extends Command
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
        Post::with(['author'])
            ->has('likers', '>=10')
            ->withCount('likers')
            ->where('created_at', '>=', now()->subWeek())
            ->chunk(100, function (Collection $posts) {
                $posts->each(function (Post $post) {
                    if ($post->likers_count >= 50) {
                        $post->author->reward(Educator::class);
                    } elseif ($post->likers_count >= 30) {
                        $post->author->reward(RecognizedAuthor::class);
                    } else {
                        $post->author->reward(Writer::class);
                    }
                });
            });
    }
}
