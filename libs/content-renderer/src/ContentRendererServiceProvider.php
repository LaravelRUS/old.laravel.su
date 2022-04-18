<?php

/**
 * This file is part of laravel.su package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\ContentRenderer;

use App\ContentRenderer\Renderer\DefaultRenderer;
use App\ContentRenderer\Renderer\DocumentationTranslationRenderer;
use App\ContentRenderer\Renderer\MenuRenderer;
use App\ContentRenderer\Renderer\DocumentationRenderer;
use App\ContentRenderer\Renderer\MenuTranslationRenderer;
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
        $this->app->singleton(DefaultRenderer::class);
        $this->app->singleton(MenuRenderer::class);
        $this->app->singleton(MenuTranslationRenderer::class);
        $this->app->singleton(DocumentationRenderer::class);
        $this->app->singleton(DocumentationTranslationRenderer::class);

        $this->app->singleton(Factory::class, function (Application $app): Factory {
            $default = $app->make(ContentRendererInterface::class);

            return new Factory($default, value(static function () use ($app): iterable {
                yield Type::MENU => $app->make(MenuRenderer::class);
                yield Type::MENU_TRANSLATION => $app->make(MenuTranslationRenderer::class);
                yield Type::DOCUMENTATION => $app->make(DocumentationRenderer::class);
                yield Type::DOCUMENTATION_TRANSLATION => $app->make(DocumentationTranslationRenderer::class);
            }));
        });

        $this->app->alias(DefaultRenderer::class, ContentRendererInterface::class);
        $this->app->alias(Factory::class, FactoryInterface::class);
    }
}
