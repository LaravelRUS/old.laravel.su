<?php

namespace App\Http\Middleware;

use App\Services\TurboConfig;
use Closure;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Toast;

class TurboRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request                                                                          $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     *
     * @throws \JsonException
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $turboFrame = $request->header('Turbo-Frame');

        if (! empty($turboFrame) || str_contains($request->route()?->getName(), 'frame')) {
            $request->headers->set('X-PJAX', true);
            $request->headers->set('X-Requested-With', 'XMLHttpRequest'); // Need for correct redirect previous page
        }

        $response = $next($request);

        // remove flash data from session when response frame
        if (! empty($turboFrame) && $response?->getStatusCode() === 200) {
            session()->ageFlashData();
        }

        if ($response?->getStatusCode() === 403) {
            // сюда нужно что-то вставить
            // Toast::error(__('error.demo.403.alert.message'));

            return back(303);
        }

        if ($response?->getStatusCode() !== 302) {
            return $response;
        }

        /*
                $turbo = new TurboConfig($request);

                if ($turbo->isNativeApp()) {
                    header($request->getProtocolVersion().' 303 See Other', true, 303);

                    return $response
                        ->setStatusCode(303)
                        ->setTargetUrl($response->getTargetUrl());
                }
        */

        return $response;
    }
}
