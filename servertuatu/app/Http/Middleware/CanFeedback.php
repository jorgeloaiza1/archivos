<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CanFeedback
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
        if(Auth::user()->document == $request->document || Auth::user()->is_admin)
            return $next($request);
        else 
            return redirect('/home');
    }
}
