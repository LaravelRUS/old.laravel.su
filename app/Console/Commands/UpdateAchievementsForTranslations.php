<?php

namespace App\Console\Commands;

use App\Achievements\Unique\Lipa;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
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
        $contributors = $this->loadContributors();

        User::whereIn('github_id', $contributors)
            ->get()
            ->each(fn (User $user) => $user->reward(Lipa::class));
    }

    /**
     * Load contributors from GitHub API.
     *
     * @param int                                 $page
     * @param \Illuminate\Support\Collection|null $previous
     *
     * @return \Illuminate\Support\Collection
     */
    public function loadContributors(int $page = 1, ?Collection $previous = null): Collection
    {
        $contributors = collect()->merge($previous);

        // Send GET request to GitHub API to fetch contributors
        $response = Http::withBasicAuth('token', config('services.github.token'))
            ->get('https://api.github.com/repos/'.config('services.github.repos.docs').'/contributors', [
                'page' => $page,
            ]);

        if (! $response->successful()) {
            $this->error('Failed to fetch contributors from GitHub API.');
        }

        $new = $response->collect()->pluck('id')->filter();

        $contributors = $contributors->merge($new);

        return $new->isNotEmpty()
            ? $this->loadContributors($page + 1, $contributors)
            : $contributors;
    }
}
