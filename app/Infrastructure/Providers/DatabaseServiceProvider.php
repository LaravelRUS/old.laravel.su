<?php

declare(strict_types=1);

namespace App\Infrastructure\Providers;

use App\Domain\Article\ArticleRepositoryInterface;
use App\Domain\Documentation\DocumentationRepositoryInterface;
use App\Domain\Documentation\VersionRepositoryInterface;
use App\Infrastructure\Doctrine\Persistence\Repository\ArticleDatabaseRepository;
use App\Infrastructure\Doctrine\Persistence\Repository\DocumentationDatabaseRepository;
use App\Infrastructure\Doctrine\Persistence\Repository\VersionDatabaseRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class DatabaseServiceProvider extends ServiceProvider
{
    /**
     * @var list<class-string>
     */
    private const LISTENERS = [
        \App\Infrastructure\Doctrine\Listener\DocumentationContentRenderer::class,
        \App\Infrastructure\Doctrine\Listener\ArticleContentRenderer::class,
        \App\Infrastructure\Doctrine\Listener\CreatedDateSynchronizer::class,
        \App\Infrastructure\Doctrine\Listener\UpdatedDateSynchronizer::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(ArticleRepositoryInterface::class, ArticleDatabaseRepository::class);
        $this->app->singleton(DocumentationRepositoryInterface::class, DocumentationDatabaseRepository::class);
        $this->app->singleton(VersionRepositoryInterface::class, VersionDatabaseRepository::class);

        // Register listeners
        foreach (self::LISTENERS as $listener) {
            $this->app->singleton($listener);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
