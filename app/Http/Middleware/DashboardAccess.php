<?php

namespace App\Http\Middleware;

use Closure;

class DashboardAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        abort_if(auth()->check() && !auth()->user()->access_dashboard, '503',  'Your Dashboard Account is disabled. Please contact administration.');
        return $next($request);
    }
}
