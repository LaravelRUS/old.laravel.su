<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Providers;

use App\Entity;
use App\Entity\Repository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class DatabaseServiceProvider extends ServiceProvider
{
    /**
     * <code>
     *  [
     *      RepositoryInterface::class => Entity::class
     *  ]
     * <code>
     *
     * @var array<class-string<ObjectRepository>, class-string>
     */
    private const REPOSITORIES = [
        Repository\VersionsRepository::class      => Entity\Version::class,
        Repository\DocumentationRepository::class => Entity\Documentation::class,
        Repository\ArticlesRepository::class      => Entity\Article::class,
    ];

    /**
     * @var list<class-string>
     */
    private const LISTENERS = [
        Entity\Documentation\Listener\OnContentRender::class,
        Entity\Article\Listener\OnContentRender::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        // Register repository interfaces
        foreach (self::REPOSITORIES as $repository => $entity) {
            $this->app->singleton($repository, static function (Application $app) use ($entity): ObjectRepository {
                return $app->make(EntityManagerInterface::class)
                    ->getRepository($entity)
                ;
            });
        }

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
