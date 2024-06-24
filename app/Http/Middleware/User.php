<?php

namespace App\Http\Middleware;

use Closure;

class User
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
        if (empty(session('user'))) {
            return redirect()->route('login.form');
        } else {

            if ($request->user()->role == 'user' || $request->user()->role == 'sales_person') {
                return $next($request);
            } else {
                notify()->error('You do not have any permission to access this page');
                // request()->session()->flash('error','You do not have any permission to access this page');
                return redirect()->route('login.form');
            }

            // return $next($request);
        }
    }
}
