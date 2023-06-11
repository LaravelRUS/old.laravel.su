<?php

use App\Application\Http\View\Composers;
use App\Application\Http\View\Directives;

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'paths' => [
        resource_path('views'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Typically, this is within the storage
    | directory. However, as usual, you are free to change this value.
    |
    */

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        realpath(storage_path('framework/views'))
    ),

    /*
    |--------------------------------------------------------------------------
    | View Composers
    |--------------------------------------------------------------------------
    |
    | View composers are callbacks or class methods that are called when a view
    | is rendered. If you have data that you want to be bound to a view each
    | time that view is rendered, a view composer can help you organize that
    | logic into a single location.
    |
    */

    'composers' => [
        Composers\VersionsComposer::class => [
            'page.docs.partials.versions',
            'page.status.partials.menu',
        ],

        Composers\YandexMetrikaComposer::class => [
            'partials.yandex-metrika',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | View Directives
    |--------------------------------------------------------------------------
    |
    | Blade allows you to define your own custom directives using the directive
    | method. When the Blade compiler encounters the custom directive, it will
    | call the provided callback with the expression that the directive
    | contains.
    |
    */

    'directives' => [
        'active' => Directives\ActiveDirective::class,
        'nav'    => Directives\NavDirective::class,
    ],
];
