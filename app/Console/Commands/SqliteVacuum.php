<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\SQLiteConnection;

class SqliteVacuum extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sqlite:vacuum
                            {connection=sqlite : The connection to optimize}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize the SQLite database by running VACUUM';

    /**
     * Execute the console command.
     *
     * @param \Illuminate\Database\DatabaseManager $manager
     *
     * @return void
     */
    public function handle(DatabaseManager $manager)
    {
        $connection = $this->argument('connection');
        $db = $this->getDatabase($manager, $connection);

        $this->vacuum($db);
    }

    /**
     * Runs the VACUUM command on the SQLite database.
     * This command rebuilds the database file, repacking it into minimal space and defragmenting the storage.
     *
     * @param \Illuminate\Database\ConnectionInterface $connection
     *
     * @return bool
     */
    protected function vacuum(ConnectionInterface $connection)
    {
        return $connection->statement('PRAGMA vacuum;');
    }

    /**
     * Returns the Database Connection
     *
     * @param \Illuminate\Database\DatabaseManager $manager
     * @param string                               $connection
     *
     * @return \Illuminate\Database\Connection
     */
    protected function getDatabase(DatabaseManager $manager, string $connection)
    {
        $db = $manager->connection($connection);

        // We will throw an exception if the database is not SQLite
        if (! $db instanceof SQLiteConnection) {
            throw new LogicException("The '$connection' connection must be sqlite, [{$db->getDriverName()}] given.");
        }

        return $db;
    }
}
