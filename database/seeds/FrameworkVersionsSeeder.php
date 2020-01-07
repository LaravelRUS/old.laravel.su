<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

use Carbon\Carbon;
use Illuminate\Database\Connection;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Seeder;

/**
 * Class FrameworkVersionsSeeder
 */
class FrameworkVersionsSeeder extends Seeder
{
    /**
     * @var string[]
     */
    private const FRAMEWORK_VERSIONS = [
        '4.1',
        '4.2',
        '5.0',
        '5.1',
        '5.2',
        '5.3',
        '5.4',
        '5.5',
        '5.6',
        '5.7',
        '5.8',
        '6.x',
    ];

    /**
     * @var Builder
     */
    private Builder $table;

    /**
     * FrameworkVersionsSeeder constructor.
     *
     * @param Connection $conn
     */
    public function __construct(Connection $conn)
    {
        $this->table = $conn->table('versions');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->table->truncate();

        $versions = [];

        foreach (self::FRAMEWORK_VERSIONS as $version) {
            $versions[] = [
                'title'         => $version,
                'is_documented' => true,
                'created_at'    => Carbon::now(),
            ];
        }

        $this->table->insert($versions);
    }
}
