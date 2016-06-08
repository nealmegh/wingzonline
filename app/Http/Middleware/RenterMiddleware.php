<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RenterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if ( !in_array('Renter',  Auth::roles() ) ) {
//            return redirect(handles('renter-access-only'));
            return view('frontend.renter-access-only');

        }

        return $next($request);
    }

}
