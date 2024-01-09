<?php

use App\Docs;
use App\Jobs\UserAttributesCorrelation;
use App\Models\IdeaKey;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('app:checkout-latest-docs', function () {
    $docsUrl = config('services.github.docs_repo_url');

    // Update existing clones
    collect(Docs::SUPPORT_VERSIONS)
        ->filter(fn (string $version) => Storage::disk('docs')->exists($version))
        ->every(fn (string $version) => Process::path(storage_path('docs/'.$version))->run('git pull'));

    // Clone a new version if not already present
    collect(Docs::SUPPORT_VERSIONS)
        ->filter(fn (string $version) => ! Storage::disk('docs')->exists($version))
        ->every(fn (string $version) => Process::path(storage_path('docs'))
            ->run("git clone --single-branch --branch '$version' $docsUrl '$version'"));

})->purpose('Checkout the latest Laravel docs');


Artisan::command('app:update-packages', function () {
    \App\Models\Package::approved()->chunk(100, function (Collection $packages) {
        $packages->each(fn($package) => \App\Jobs\UpdateStatusPackages::dispatch($package));
    });
})->purpose('Update information about users packages');

//убрать после проверки
Artisan::command('app:keys', function () {
    for($i=0; $i<10; $i++){
        $key = new IdeaKey;
        $key->key =  Str::uuid();
        $key->save();
    }
})->purpose('Update information about users packages');
