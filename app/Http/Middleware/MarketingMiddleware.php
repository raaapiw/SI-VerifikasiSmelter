<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class MarketingMiddleware
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
        if(Sentinel::check())
            if(Sentinel::getUser()->roles()->first()->slug == 'marketing')
                return $next($request);
            else
                return abort(404);
        else
            return redirect()->route('login');
    }
}
