<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Opening
{
    /**
     * @var string[]
     */
    protected $except = [
        // common
        'manifest',
        'cover',

        'quiz.open',
        'quiz.goronich',

        // auth
        'quiz.login',
        'auth.callback',
        'auth.logout',
    ];

    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (config('site.quiz', false) === false) {
            return $next($request);
        }

        if ($request->user() !== null) {
            return $next($request);
        }

        $routeName = optional($request->route())->getName();

        foreach ($this->except as $white) {
            if ($white === $routeName) {
                return $next($request);
            }
        }

        return redirect()->route('quiz.open');
    }
}
