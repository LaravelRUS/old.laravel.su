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

    /**
     * @param Connection $conn
     */
    public function __construct(
        private readonly Connection $conn
    ) {
    }

    /**
     * @return void
     */
    public function run(): void
    {
        $table = $this->conn->table('versions');

        foreach (self::VERSIONS as $version => $documented) {
            $table->insert(['title' => $version, 'is_documented' => $documented]);
        }
    }
}
