<?php

declare(strict_types=1);

return [
    'laravel-source' => [
        'user'       => env('GITHUB_DOCS_ORIGINAL_USER', 'laravel'),
        'repository' => env('GITHUB_DOCS_ORIGINAL_REPO', 'docs'),
    ],

    'laravel-translation' => [
        'user'       => env('GITHUB_DOCS_TRANSLATED_USER', 'LaravelRUS'),
        'repository' => env('GITHUB_DOCS_TRANSLATED_REPO', 'docs'),
    ],
];
