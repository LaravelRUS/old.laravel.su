<?php

declare(strict_types=1);

namespace App\GitHub\Common;

use Github\Client;

interface InteractWithApiInterface
{
    /**
     * @return Client
     */
    public function getClient(): Client;
}
