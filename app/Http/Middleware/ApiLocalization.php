<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;

class ApiLocalization
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $lang = $request->hasHeader('lang') ? $request->header('lang') : app()->getLocale();
        app()->setLocale($lang);
        $response->headers->set('lang', $lang);
        return $response;
    }
}
