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
        $lang = $request->hasHeader('lang') ? $request->header('lang') : app()->getLocale();
        app()->setLocale($lang);
        return $next($request)->headers->set('lang', $lang);
    }
}
