<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;

class ApiCurrency
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
        if (!request()->hasHeader('currency')) {

            $currency = \App\Models\Currency::where('currency_symbol_en', 'KWD')->first();

            if($currency) {

                $response = $next($request);

                $response->headers->set('currency', $currency->currency_symbol_en);
            }

        } else {
            $response = $next($request);

            $response->headers->set('currency', $request->header('currency'));
        }


        return $response;
    }
}
