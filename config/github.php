<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Default GitHub Connection Name
    |--------------------------------------------------------------------------
    |
    | TODO
    |
    */

    'default' => env('GITHUB_CONNECTION', 'default'),

    /*
    |--------------------------------------------------------------------------
    | GitHub Connections
    |--------------------------------------------------------------------------
    |
    | TODO
    |
    */

    'connections' => [
        'default' => [
            'token' => env('GITHUB_AUTH_ACCESS_TOKEN', env('GITHUB_CLIENT_SECRET')),
        ],
    ],
];
