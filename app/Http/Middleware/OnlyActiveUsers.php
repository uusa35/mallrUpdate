<?php

namespace App\Http\Middleware;

use Closure;

class OnlyActiveUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        abort_if(!auth()->user()->active,'404','Account is deactivated;.');
        return $next($request);
    }
}
