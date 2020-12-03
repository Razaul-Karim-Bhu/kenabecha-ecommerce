<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class ShippingIdCheckMiddleWare
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
        if (!Session::get('shipping_id')) {
            return redirect('/checkout/shipping');
        } else {
            return $next($request);
        }
    }
}
