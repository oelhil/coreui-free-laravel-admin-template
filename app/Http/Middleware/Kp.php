<?php

namespace App\Http\Middleware;

use Closure;

class Kp
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
        $roles = explode(',', $request->user()->menuroles);
         if ( ! in_array('kp', $roles) ) {
             return abort( 401 );
        }
        return $next($request);
    }
}
