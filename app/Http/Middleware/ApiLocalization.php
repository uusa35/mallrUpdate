<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;

class ApiLocalization
{
    public $app;

    /**
     * Localization constructor.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->app->setLocale($request->header('lang') ? $request->header('lang') : app()->getLocale());
        
        $response = $next($request);

        $response->headers->set('lang', $request->header('lang'));

        return $response;
    }
}
