<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class InstructorMiddleware
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

        if ( !in_array('Instructor',  Auth::roles() ) ) {
//            return redirect(handles('renter-access-only'));
            return view('errors.501');

        }

        return $next($request);
    }


}
