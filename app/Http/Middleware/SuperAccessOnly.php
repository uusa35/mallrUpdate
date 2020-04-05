<?php

namespace App\Http\Middleware;

use Closure;

class SuperAccessOnly
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
        abort_if(!auth()->user()->isSuper, '404', 'Super Admin zone only !!!');
        return $next($request);
    }
}
