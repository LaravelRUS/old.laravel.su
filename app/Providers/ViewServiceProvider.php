<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Providers;

use App\Http\View\Composers\VersionsComposer;
use App\Http\View\Composers\YandexMetrikaComposer;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ServiceProvider;

/**
 * Class ViewServiceProvider
 */
class ViewServiceProvider extends ServiceProvider
{
    /**
     * @var array[]
     */
    private const VIEW_COMPOSERS = [
        YandexMetrikaComposer::class => ['partials.yandex-metrika'],
        VersionsComposer::class      => ['partials.version-selector'],
    ];

    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(YandexMetrikaComposer::class);
    }

    /**
     * @param Factory $factory
     * @return void
     */
    public function boot(Factory $factory): void
    {
        foreach (self::VIEW_COMPOSERS as $composer => $views) {
            $this->app->singleton($composer);

            $factory->composer($views, $composer);
        }
    }
}
