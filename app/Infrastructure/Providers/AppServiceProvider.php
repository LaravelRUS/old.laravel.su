<?php

declare(strict_types=1);

namespace App\Infrastructure\Providers;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Monolog\Logger;
use Monolog\Processor\PsrLogMessageProcessor;

class AppServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        if ($this->app instanceof Application && $this->app->isLocal()) {
            $this->app->register(TelescopeServiceProvider::class);
            $this->app->register(IdeHelperServiceProvider::class);
        }
    }

    public function boot(): void
    {
        $logger = $this->app->get('log');

        if ($logger instanceof Logger) {
            $logger->pushProcessor(new PsrLogMessageProcessor());
        }
    }
}
