<?php

namespace App\Jobs;

use App\Models\Package;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

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
       $info = Http::get("https://packagist.org/packages/{$this->package->packagist_name}.json")
            ->collect('package')->only([
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
           'website'    => $info['repository'],
       ]);
    }
}
