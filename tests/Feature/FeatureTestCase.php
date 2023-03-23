<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests\Feature;

use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Connection;
use Illuminate\Database\DatabaseManager;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

abstract class FeatureTestCase extends TestCase
{
    use InteractsWithDatabase;
    use RefreshDatabase;
    use DatabaseMigrations;

    /**
     * @var array<non-empty-string>
     */
    protected array $connectionsToTransact = [
        'default',
    ];

    /**
     * @var EntityManagerInterface
     */
    protected EntityManagerInterface $em;

    /**
     * @return void
     * @throws BindingResolutionException
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->em = $this->make(EntityManagerInterface::class);
        $this->em->clear();
    }

    /**
     * @param string $abstract
     * @param array $params
     * @return mixed
     * @throws BindingResolutionException
     */
    protected function make(string $abstract, array $params = [])
    {
        return $this->app->make($abstract, $params);
    }

    /**
     * @return void
     * @throws BindingResolutionException
     * @throws \Throwable
     */
    public function tearDown(): void
    {
        /** @var DatabaseManager $db */
        $db = $this->app->make(DatabaseManager::class);

        /**
         * Close all DB connections in order to prevent
         * "Too many connections" issue.
         *
         * @var Connection $connection
         */
        foreach ($db->getConnections() as $connection) {
            $connection->disconnect();
        }

        parent::tearDown();
    }

    /**
     * @param string $table
     * @param array $payload
     * @param string|null $connection
     * @return $this
     */
    protected function withDatabaseData(string $table, array $payload, string $connection = null): self
    {
        $this->getConnection($connection)
            ->table($table)
            ->insert($payload)
        ;

        return $this;
    }

    /**
     * @param string $table
     * @param array $payload
     * @param string|null $connection
     * @return int
     */
    protected function withDatabaseRecord(string $table, array $payload, string $connection = null): int
    {
        $conn = $this->getConnection($connection)
            ->table($table)
        ;

        return $conn->insertGetId($payload);
    }

    /**
     * @param string $table
     * @param string|null $connection
     * @return $this
     */
    protected function withDatabaseEmptyTable(string $table, string $connection = null): self
    {
        $conn = $this->getConnection($connection)
            ->table($table)
        ;

        $conn->delete();

        return $this;
    }

    /**
     * @param string $table
     * @param string|null $connection
     * @return $this
     */
    protected function dumpDatabaseTable(string $table, string $connection = null): self
    {
        $this->getConnection($connection)
            ->table($table)
            ->get()
            ->dump()
        ;

        return $this;
    }
}
