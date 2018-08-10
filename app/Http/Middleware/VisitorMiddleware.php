<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class VisitorMiddleware
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
        if(!Sentinel::check())
            return $next($request);
        else
            if(Sentinel::getUser()->roles()->first()->slug == 'superAdmin')
                return redirect()->route('superAdmin.dashboard');
            elseif(Sentinel::getUser()->roles()->first()->slug == 'admin')
                return redirect()->route('admin.dashboard');
            elseif(Sentinel::getUser()->roles()->first()->slug == 'minerba')
                return redirect()->route('minerba.dashboard');
            elseif(Sentinel::getUser()->roles()->first()->slug == 'client')
                return redirect()->route('client.dashboard');
            elseif(Sentinel::getUser()->roles()->first()->slug == 'marketing')
                return redirect()->route('marketing.dashboard');
            else
                return abort(404);
    }
}
