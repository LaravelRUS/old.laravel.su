<?php

declare(strict_types=1);

namespace App\Infrastructure\Providers;

use App\Application\Http\View\Directives\GeneratedDirectiveInterface;
use App\Application\Http\View\Directives\IfDirectiveInterface;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * @throws BindingResolutionException
     */
    public function boot(Repository $config, Factory $factory, BladeCompiler $compiler): void
    {
        // Load view composers
        foreach ($config->get('view.composers', []) as $composer => $views) {
            $this->app->singleton($composer);

            $factory->composer($views, $composer);
        }

        // Load directives
        foreach ($config->get('view.directives', []) as $name => $directive) {
            $impl = $this->app->make($directive);

            if ($impl instanceof GeneratedDirectiveInterface) {
                $compiler->directive($name, static fn(...$args): string => $impl->generate(...$args));
            }

            if ($impl instanceof IfDirectiveInterface) {
                $compiler->if($name, static fn(...$args): bool => $impl->match(...$args));
            }
        }
    }
}
