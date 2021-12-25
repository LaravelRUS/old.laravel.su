<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\GitHub;

use Github\Client;

interface ManagerInterface
{
    /**
     * Get a driver instance.
     *
     * @param string|null $driver
     * @return Client
     */
    public function driver($driver = null): Client;
}
