<?php

/**
 * This file is part of laravel.su package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\ContentRenderer;

use App\ContentRenderer\Renderer\ContentRendererInterface;
use App\ContentRenderer\Renderer\LaravelRusMarkdownRenderer;
use App\ContentRenderer\Renderer\PrivateContentRendererInterface;
use App\ContentRenderer\Renderer\PublicContentRendererInterface;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Support\ServiceProvider;
use League\CommonMark\Block\Element\FencedCode;
use League\CommonMark\Block\Element\IndentedCode;
use League\CommonMark\Environment;
use League\CommonMark\EnvironmentInterface;
use Spatie\CommonMarkHighlighter\FencedCodeRenderer;
use Spatie\CommonMarkHighlighter\IndentedCodeRenderer;

/**
 * Class ContentRendererServiceProvider.
 */
class ContentRendererServiceProvider extends ServiceProvider
{
    /**
     * @return void
     * @throws \InvalidArgumentException
     */
    public function register(): void
    {
        $this->loadConfigs();
        $this->registerMarkdown();

        $this->app->singleton(ContentRendererInterface::class, function () {
            return $this->app->make(LaravelRusMarkdownRenderer::class);
        });
    }

    /**
     * @return void
     */
    private function loadConfigs(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/content-renderer.php'       => \config_path('content-renderer.php'),
                __DIR__ . '/../resources/content-renderer/php.json'  => \config_path('content-renderer/php.json'),
                __DIR__ . '/../resources/content-renderer/json.json' => \config_path('content-renderer/json.json'),
            ]);
        }

        $this->mergeConfigFrom(__DIR__ . '/../resources/content-renderer.php', 'content-renderer');
    }

    /**
     * @return void
     */
    private function registerMarkdown(): void
    {
        $this->app->singleton(EnvironmentFactory::class, function () {
            $config = $this->app->make(Repository::class);

            return new EnvironmentFactory((array)$config->get('content-renderer.config', []));
        });
    }
}
