<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            if (auth()->user()->role == 'admin') {
                $route = '/admin';
            } else  if (auth()->user()->role == 'user') {
                $route = '/user';
            } else  if (auth()->user()->role == 'distributor') {
                $route = '/user/distributor';
            } else {
                $route = '/';
            }

            return redirect($route);
        }

        return $next($request);
    }
}
