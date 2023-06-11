<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Connection;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class VersionsSeeder extends Seeder
{
    /**
     * @var array<non-empty-string, bool>
     */
    private const VERSIONS = [
        '8.x' => true,
        '7.x' => false,
        '6.x' => false,
        '5.8' => false,
        '5.7' => false,
        '5.6' => false,
        '5.5' => false,
        '5.4' => true,
        '5.3' => false,
        '5.2' => false,
        '5.1' => false,
        '5.0' => false,
        '4.2' => true,
        '4.1' => false,
        '4.0' => false,
    ];

    public function __construct(
        private readonly Connection $conn
    ) {
    }

    public function run(): void
    {
        $table = $this->conn->table('versions');

        foreach (self::VERSIONS as $version => $documented) {
            $table->insert([
                'id' => (string)Uuid::uuid4(),
                'title' => $version,
                'is_documented' => $documented,
            ]);
        }
    }
}
