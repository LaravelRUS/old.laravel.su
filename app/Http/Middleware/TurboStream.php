<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TurboStream
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {
        /** @var \Illuminate\Http\Response $response */
        $response = $next($request);

        if (is_a($response, Response::class)) {
            $response->header('Content-Type', 'text/vnd.turbo-stream.html');
        }

        return $response;
    }
}
