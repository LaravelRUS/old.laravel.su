<?php

declare(strict_types=1);

namespace App\Infrastructure\Providers;

use App\Domain\Article\ArticleRepositoryInterface;
use App\Domain\Documentation\DocumentationRepositoryInterface;
use App\Domain\Documentation\VersionRepositoryInterface;
use App\Infrastructure\Persistence\Doctrine\Repository\ArticleDatabaseRepository;
use App\Infrastructure\Persistence\Doctrine\Repository\DocumentationDatabaseRepository;
use App\Infrastructure\Persistence\Doctrine\Repository\VersionDatabaseRepository;
use Doctrine\ORM\EntityRepository;
use Illuminate\Database\Grammar;
use Illuminate\Database\Schema\Grammars\PostgresGrammar;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Fluent;
use Illuminate\Support\ServiceProvider;

class DatabaseServiceProvider extends ServiceProvider
{
    /**
     * @var list<class-string>
     */
    private const LISTENERS = [
        \App\Infrastructure\Persistence\Doctrine\Listener\DocumentationContentRenderer::class,
        \App\Infrastructure\Persistence\Doctrine\Listener\ArticleContentRenderer::class,
        \App\Infrastructure\Persistence\Doctrine\Listener\CreatedDateSynchronizer::class,
        \App\Infrastructure\Persistence\Doctrine\Listener\UpdatedDateSynchronizer::class,
    ];

    /**
     * @var array<class-string, class-string<EntityRepository>>
     */
    private const REPOSITORIES = [
        ArticleRepositoryInterface::class => ArticleDatabaseRepository::class,
        DocumentationRepositoryInterface::class => DocumentationDatabaseRepository::class,
        VersionRepositoryInterface::class => VersionDatabaseRepository::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->registerRepositoryInterfaces();
        $this->registerDoctrineListeners();
        $this->registerPostgresTypes();
    }

    private function registerRepositoryInterfaces(): void
    {
        foreach (self::REPOSITORIES as $interface => $implementation) {
            $this->app->singleton($interface, $implementation);
        }
    }

    private function registerDoctrineListeners(): void
    {
        foreach (self::LISTENERS as $listener) {
            $this->app->singleton($listener);
        }
    }

    private function registerPostgresTypes(): void
    {
        Grammar::macro('typeText[]', function (Fluent $column): string {
            $size = (int)$column->get('size', 0);

            return \sprintf('TEXT[%s]', $size > 0 ? $size : '');
        });

        Grammar::macro('typeString[]', function (Fluent $column): string {
            $length = (int)$column->get('length', 255);
            $size = (int)$column->get('size', 0);

            return \sprintf('VARCHAR(%d)[%s]', $length, $size > 0 ? $size : '');
        });

        Grammar::macro('typeInteger[]', function (Fluent $column): string {
            $length = (int)$column->get('length', 255);
            $size = (int)$column->get('size', 0);

            return \sprintf('INTEGER(%d)[%s]', $length, $size > 0 ? $size : '');
        });
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
