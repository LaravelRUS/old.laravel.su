<?php

namespace App\Providers;

use App\Services\VersionService;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(TelescopeServiceProvider::class);
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        View::composer('docs*', function ($view) {
//            $versionService = new VersionService();
//            $documentedVersions = $versionService->documentedVersions();
//            $versionTitle = request()->route("version");
//            $view->with("documentedVersions", $documentedVersions);
//            $view->with("versionTitle", $versionTitle);
//        });
    }
}
