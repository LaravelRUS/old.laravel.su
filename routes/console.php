<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Process;
use App\Docs;

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


Artisan::command('checkout-latest-docs', function () {
    // Update existing clones
    collect(Docs::SUPPORT_VERSION)
        ->filter(fn(string $version) => Storage::disk('docs')->exists($version))
        ->every(fn(string $version) => Process::path(storage_path('docs/' . $version))->run('git pull'));


    // Clone a new version if not already present
    collect(Docs::SUPPORT_VERSION)
        ->filter(fn(string $version) => !Storage::disk('docs')->exists($version))
        ->every(fn(string $version) => Process::path(storage_path('docs'))
            ->run("git clone --single-branch --branch '$version' https://github.com/laravelRus/docs '$version'"));

})->purpose('Checkout the latest Laravel docs');

