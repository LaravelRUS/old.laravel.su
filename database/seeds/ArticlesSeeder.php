<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

use Illuminate\Database\Connection;
use Illuminate\Database\Seeder;

/**
 * Class ArticlesSeeder
 */
class ArticlesSeeder extends Seeder
{
    /**
     * @var Connection
     */
    private Connection $conn;

    /**
     * ArticlesSeeder constructor.
     *
     * @param Connection $conn
     */
    public function __construct(Connection $conn)
    {
        $this->conn = $conn;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->conn->table('articles')
            ->truncate();

        $this->conn->statement(\file_get_contents(__DIR__ . '/ArticlesSeeder/default_articles.sql'));
    }
}
