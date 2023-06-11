<?php

namespace App\Application\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var list<class-string|non-empty-string>
     */
    protected $middleware = [
        \App\Application\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Application\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \App\Application\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<non-empty-string, list<class-string|non-empty-string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            // \Illuminate\Session\Middleware\StartSession::class,
            // \App\Application\Http\Middleware\VerifyCsrfToken::class,
        ],

        'api' => [
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<non-empty-string, class-string>
     */
    protected $routeMiddleware = [
        'version' => \App\Application\Http\Middleware\VersionSelector::class,
    ];
}
