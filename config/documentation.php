<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
