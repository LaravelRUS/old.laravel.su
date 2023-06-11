<?php

declare(strict_types=1);

namespace App\Infrastructure\Providers;

use Illuminate\Container\Container;
use Illuminate\Contracts\Config\Repository as ConfigRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Psr\Clock\ClockInterface;
use Symfony\Component\Clock\NativeClock;

final class DateTimeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(\DateTimeZone::class, static function (Container $app): \DateTimeZone {
            $config = $app->make(ConfigRepositoryInterface::class);

            $timezone = $config->get('app.timezone') ?? 'UTC';

            return new \DateTimeZone($timezone);
        });

        $this->app->singleton(ClockInterface::class, static function (Container $app): ClockInterface {
            return new NativeClock($app->make(\DateTimeZone::class));
        });
    }
}
