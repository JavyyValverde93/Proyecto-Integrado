<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()!=null && Auth::user()->tipo==1){
            return $next($request);
        }else{
            return back()->with('error', 'No tienes permiso para acceder a esta zona');
        }
    }
}
