<?php

use App\Docs;
use App\Models\IdeaKey;
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

Artisan::command('inspire2', function () {

    $response = \Illuminate\Support\Facades\Http::get('https://feeds.tildacdn.com/api/getfeed/?feeduid=172673690982&recid=235945225&c=1708315592871&size=200');

    \App\Models\Meet::all()->each->delete();

    $posts = $response->collect('posts')->map(function (array $items) {

        return (new \App\Models\Meet())->forceFill([
            'user_id'     => 1,
            'approved'    => true,
            'name'        => trim(html_entity_decode(strip_tags(htmlspecialchars_decode($items['title']))), " \t\n\r\0\x0B\xC2\xA0"),
            'description' => trim(html_entity_decode(strip_tags(htmlspecialchars_decode($items['descr']))), " \t\n\r\0\x0B\xC2\xA0"),
            'start_date'  => $items['date'],
            'online'      => Str::of($items['parts'])->contains('Есть трансляция'),
            'link'        => $items['directlink'],
        ]);
    });

    \App\Models\User::where('email', 'bliz48rus@gmail.com')->first()->meets()->saveMany($posts);
});

Artisan::command('inspire', function () {

    // array:1 [
    //    "file" => array:2 [
    //        "url" => "https://habrastorage.org/getpro/moikrug/uploads/redactor_image/08022024/images/f207f75c973a03a9018db1ebc83e4513.png"
    //        "id" => 1707360638
    //   ]
    // ]

    $response = \Illuminate\Support\Facades\Http::asMultipart()
        ->attach('file[]', fopen('/Users/tabuna/Sites/ru-laravel-project/public/img/hot-dog.png', 'r'))
        ->post('https://career.habr.com/link/redactor_image');

    dd($response->json());

    $test = \Illuminate\Support\Facades\Http::delete(route('quiz.goronich'));

    dd($test->header('X-Vasilisa-Say'), $test->body());

    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

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
    \App\Models\Package::approved()->chunk(100, function (Collection $packages) {
        $packages->each(fn ($package) => \App\Jobs\UpdateStatusPackages::dispatch($package));
    });
})->purpose('Update information about users packages');

// убрать после проверки
Artisan::command('app:keys', function () {
    for ($i = 0; $i < 10; $i++) {
        $key = new IdeaKey;
        $key->key = Str::uuid();
        $key->save();
    }
})->purpose('Update information about users packages');
