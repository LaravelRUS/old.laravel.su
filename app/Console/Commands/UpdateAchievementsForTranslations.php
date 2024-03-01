<?php

namespace App\Console\Commands;

use App\Achievements\Contents\CommentInteraction;
use App\Achievements\Contents\HighCommentInteraction;
use App\Achievements\Unique\Lipa;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Http;

class UpdateAchievementsForTranslations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:achievements-translation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update achievements for users based on their recent translation contributions.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Send GET request to GitHub API to fetch contributors
        $response = Http::withBasicAuth('token', config('services.github.token'))
            ->get('https://api.github.com/repos/laravel-russia/docs/contributors');


        if (!$response->successful()) {
            $this->error('Failed to fetch contributors from GitHub API.');
        }

        $contributors = $response->collect()->pluck('id')->filter();

        $users = User::whereIn('github_id', $contributors)->get();

        // Reward each user for translation contribution
        $users->each(fn(User $user) => $user->reward(Lipa::class));
    }
}
