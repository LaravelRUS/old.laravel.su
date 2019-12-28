<?php

return [
    'default_version' => '5.4',

    'original_docs' => [
        'user' => env("GITHUB_ORIGINAL_DOCS_USER"),
        'repository' => env("GITHUB_ORIGINAL_DOCS_REPO")
    ],

    'translated_docs' => [
        'user' => env("GITHUB_TRANSLATED_DOCS_USER"),
        'repository' => env("GITHUB_TRANSLATED_DOCS_REPO")
    ],

    'sleepingowl_admin_docs' => [
        'user' => 'sleeping-owl',
        'repository' => 'admin-docs'
    ],

    'github_client_id' => env("GITHUB_CLIENT_ID"),
    'github_client_secret' => env("GITHUB_CLIENT_SECRET"),
    'github_hook_secret' => env("GITHUB_HOOK_SECRET"),

    'yandex_metrika_id' => env("YANDEX_METRIKA_ID")
];
