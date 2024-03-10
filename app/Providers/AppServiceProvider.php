<?php

namespace App\Providers;

use App\View\Components\Posts\Github;
use App\View\Components\Posts\Hidden;
use App\View\Components\Posts\LinkPreview;
use App\View\Components\Posts\Youtube;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        Blade::component('github', Github::class);
        Blade::component('youtube', Youtube::class);
        Blade::component('link', LinkPreview::class);
        Blade::component('hidden', Hidden::class);
    }
}
