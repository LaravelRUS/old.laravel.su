<?php

declare(strict_types=1);

namespace Tests\Feature;

use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Database\Connection;
use Illuminate\Database\DatabaseManager;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Group;
use Tests\TestCase;

#[Group('feature')]
abstract class FeatureTestCase extends TestCase
{
    use InteractsWithDatabase;
    use RefreshDatabase;
    use DatabaseMigrations;

    protected array $connectionsToTransact = [];

    protected EntityManagerInterface $em;

    public function setUp(): void
    {
        parent::setUp();

        $this->em = $this->make(EntityManagerInterface::class);
        $this->em->clear();
    }

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

    protected function make(string $abstract, array $params = [])
    {
        return $this->app->make($abstract, $params);
    }

    protected function withDatabaseData(string $table, array $payload, string $connection = null): self
    {
        $this->getConnection($connection)
            ->table($table)
            ->insert($payload)
        ;

        return $this;
    }

    protected function withDatabaseRecord(string $table, array $payload, string $connection = null): int|string
    {
        $conn = $this->getConnection($connection)
            ->table($table)
        ;

        return $conn->insertGetId($payload);
    }

    protected function withDatabaseEmptyTable(string $table, string $connection = null): self
    {
        $conn = $this->getConnection($connection)
            ->table($table)
        ;

        $conn->delete();

        return $this;
    }

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
