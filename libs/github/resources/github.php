<?php

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
