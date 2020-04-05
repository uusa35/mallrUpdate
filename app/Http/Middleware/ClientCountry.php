<?php

namespace App\Http\Middleware;

use App\Models\Country;
use Closure;

class ClientCountry
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
        if (!session()->has('country') || is_null(session()->get('country'))) {
            if (auth()->check()) {
                session()->put('country', auth()->user()->country);
            } else {
                if (getClientCountry()) {
                    session()->put('country', getClientCountry());
                } else {
                    $currentCountry = Country::where('is_local', true)->first();
                    session()->put('country', $currentCountry);
                }
            }
        }
        return $next($request);
    }
}
