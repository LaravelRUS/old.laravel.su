<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Providers;

use App\Model\Documentation;
use App\Model\FrameworkVersion;
use App\Model\Repository\DocumentationRepositoryInterface;
use App\Model\Repository\EloquentDocumentationRepository;
use App\Model\Repository\EloquentFrameworkVersionRepository;
use App\Model\Repository\FrameworkVersionRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

/**
 * Class DatabaseServiceProvider
 */
class DatabaseServiceProvider extends ServiceProvider
{
    /**
     * @var string[]|Model[]
     */
    private const BUILDERS = [
        EloquentFrameworkVersionRepository::class => FrameworkVersion::class,
        EloquentDocumentationRepository::class    => Documentation::class,
    ];

    /**
     * @var string[][]
     */
    private const REPOSITORIES = [
        EloquentFrameworkVersionRepository::class => [
            FrameworkVersionRepositoryInterface::class,
        ],
        EloquentDocumentationRepository::class    => [
            DocumentationRepositoryInterface::class,
        ],
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        foreach (self::REPOSITORIES as $impl => $interfaces) {
            foreach ($interfaces as $interface) {
                $this->app->singleton($interface, $impl);
            }

            if (isset(self::BUILDERS[$impl])) {
                $this->app->when($impl)
                    ->needs(Builder::class)
                    ->give(fn() => (self::BUILDERS[$impl])::query());
            }
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
