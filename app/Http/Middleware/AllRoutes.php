<?php

namespace App\Http\Middleware;

use Closure;

class AllRoutes
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
        URL::defaults([
            'restaurant_id' => $request->restaurant_id,
            'consumable_id' => $request->consumable_id,
        ]);

        return $next($request);
    }
}
