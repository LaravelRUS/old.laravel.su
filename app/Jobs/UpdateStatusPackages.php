<?php

namespace App\Jobs;

use App\Models\Package;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UpdateStatusPackages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Package $package)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Fetch package information from Packagist API
        $response = Http::get("https://packagist.org/packages/{$this->package->packagist_name}.json");

        // Check if the request was successful
        if (! $response->successful()) {
            Log::warning("Failed to fetch package information for package '{$this->package->packagist_name}'. Response: ".$response->body());

            return;
        }

        $info = $response
            ->collect('package')
            ->only([
                'name',
                'description',
                'repository',
                'github_stars',
                'downloads',
            ]);

        $this->package->update([
            'name'        => $info['name'],
            'description' => $info['description'],
            'stars'       => $info['github_stars'],
            'downloads'   => $info['downloads']['total'],
            'website'     => $info['repository'],
        ]);
    }

    /**
     * Handle a job failure.
     */
    public function failed(\Throwable $exception): void
    {
        Log::error("Failed to update package '{$this->package->packagist_name}': {$exception->getMessage()}");
    }
}
