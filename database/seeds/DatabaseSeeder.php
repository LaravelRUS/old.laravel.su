<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Connection;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Application;

final class DatabaseSeeder extends Seeder
{
    /**
     * @var array<class-string<Seeder>>
     */
    private const SEEDERS = [
        ArticlesSeeder::class,
        VersionsSeeder::class,
        DocsSeeder::class,
    ];

    /**
     * @var array<non-empty-string>
     */
    private const TABLES = [
        'articles',
        'docs',
        'versions',
    ];

    /**
     * @param Application $app
     */
    public function __construct(
        private readonly Application $app,
    ) {
    }

    /**
     * @return void
     */
    public function run(): void
    {
        if ($this->app->isProduction()) {
            throw new \LogicException('Not available on production environment');
        }

        /** @var Connection $connection */
        $connection = $this->app->make(Connection::class);

        $schema = $connection->getSchemaBuilder();
        $schema->disableForeignKeyConstraints();

        foreach (self::TABLES as $table) {
            $connection->table($table)
                ->truncate()
            ;
        }

        $schema->enableForeignKeyConstraints();

        foreach (self::SEEDERS as $seeder) {
            $this->call($seeder);
        }

        $this->command->call('su:docs:touch');
    }
}
