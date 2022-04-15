<?php

/**
 * This file is part of laravel.su package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\ContentRenderer;

use App\ContentRenderer\Renderer\DefaultRenderer;
use App\ContentRenderer\Renderer\MenuRenderer;
use Illuminate\Contracts\Events\Dispatcher as DispatcherInterface;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class ContentRendererServiceProvider extends ServiceProvider
{
    /**
     * @return void
     * @throws \InvalidArgumentException
     */
    public function register(): void
    {
        // Boot Default
        $this->registerDefaultRenderer();

        // Boot Factory
        $this->app->singleton(Factory::class, function (Application $app) {
            $factory = new Factory($app->make(ContentRendererInterface::class));

            $factory->extend(Type::MENU, static function () use ($app) {
                return new MenuRenderer($app->make(DispatcherInterface::class));
            });

            return $factory;
        });

        $this->app->alias(Factory::class, FactoryInterface::class);
    }

    /**
     * @return void
     */
    private function registerDefaultRenderer(): void
    {
        $this->app->singleton(DefaultRenderer::class);
        $this->app->alias(DefaultRenderer::class, ContentRendererInterface::class);
    }
}
