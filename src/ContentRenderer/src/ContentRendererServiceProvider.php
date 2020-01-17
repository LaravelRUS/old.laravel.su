<?php

/**
 * This file is part of laravel.su package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\ContentRenderer;

use App\ContentRenderer\Renderer\ContentRendererInterface;
use App\ContentRenderer\Renderer\MarkdownRenderer;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\ServiceProvider;
use League\CommonMark\Block\Element\FencedCode;
use League\CommonMark\Block\Element\IndentedCode;
use League\CommonMark\Converter;
use League\CommonMark\ConverterInterface;
use League\CommonMark\DocParser;
use League\CommonMark\Environment;
use League\CommonMark\EnvironmentInterface;
use League\CommonMark\HtmlRenderer;
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

        $this->app->singleton(ContentRendererInterface::class, MarkdownRenderer::class);
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
        $this->app->singleton(EnvironmentInterface::class, function (): EnvironmentInterface {
            return $this->getEnvironment(
                $this->app->make(Repository::class)
            );
        });

        $this->app->singleton(ConverterInterface::class, function (): ConverterInterface {
            $env = $this->app->make(EnvironmentInterface::class);

            $parser = new DocParser($env);
            $renderer = new HtmlRenderer($env);

            return new Converter($parser, $renderer);
        });
    }

    /**
     * @param Repository $config
     * @return EnvironmentInterface
     * @throws BindingResolutionException
     */
    private function getEnvironment(Repository $config): EnvironmentInterface
    {
        $env = Environment::createCommonMarkEnvironment();

        $env->mergeConfig((array)$config->get('content-renderer.config', []));

        foreach ((array)$config->get('content-renderer.extensions', []) as $extension) {
            $env->addExtension($this->app->make($extension));
        }

        $env->addBlockRenderer(FencedCode::class, new FencedCodeRenderer(['php', 'html']));
        $env->addBlockRenderer(IndentedCode::class, new IndentedCodeRenderer(['php', 'html']));

        return $env;
    }

    /**
     * @return array|string[]
     */
    public function provides(): array
    {
        return [
            ConverterInterface::class,
            ContentRendererInterface::class,
        ];
    }
}
