<?php

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
