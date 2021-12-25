<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
