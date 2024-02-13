<?php

namespace App\Http\Middleware;

use App\Docs;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SetDefaultVersionForUrl
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        URL::defaults(['version' => $request->route()->parameter('version', Docs::DEFAULT_VERSION)]);
        URL::defaults(['page' => $request->route()->parameter('page', 'installation')]);

        return $next($request);
    }
}
