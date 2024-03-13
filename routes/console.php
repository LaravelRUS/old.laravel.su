<?php

use App\Docs;
use App\Jobs\UpdateStatusPackages;
use App\Models\Package;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('app:checkout-latest-docs', function () {
    $docsUrl = config('services.github.docs_repo_url');

    // Update existing clones
    collect(Docs::SUPPORT_VERSIONS)
        ->filter(fn (string $version) => Storage::disk('docs')->exists($version))
        ->every(fn (string $version) => Process::path(storage_path('docs/'.$version))->run('git reset --hard HEAD && git pull'));

    // Clone a new version if not already present
    collect(Docs::SUPPORT_VERSIONS)
        ->filter(fn (string $version) => ! Storage::disk('docs')->exists($version))
        ->every(fn (string $version) => Process::path(storage_path('docs'))
            ->run("git clone --single-branch --branch '$version' $docsUrl '$version'"));

})->purpose('Checkout the latest Laravel docs');

Artisan::command('app:update-packages', function () {
    Package::approved()->chunk(100, function (Collection $packages) {
        $packages->each(fn ($package) => UpdateStatusPackages::dispatch($package));
    });
})->purpose('Update information about users packages');
