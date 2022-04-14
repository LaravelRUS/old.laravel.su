<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Application;

final class DatabaseSeeder extends Seeder
{
    /**
     * @var array<class-string<Seeder>>
     */
    private const SEEDERS = [
        ArticlesSeeder::class,
    ];

    /**
     * @var Application
     */
    private Application $app;

    /**
     * DatabaseSeeder constructor.
     *
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        if ($this->app->isProduction()) {
            throw new \LogicException('Not available on production environment');
        }

        foreach (self::SEEDERS as $seeder) {
            $this->call($seeder);
        }
    }
}
