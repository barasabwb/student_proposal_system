<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if(auth()->user()->role== 'admin'){
            return $next($request);
        }else if(auth()->user()->role== 'student'){
            return $next($request);
        }if(auth()->user()->role== 'supervisor'){
        return $next($request);
        }
        if(auth()->user()->role== 'chairman'){
            return $next($request);
        }


        return redirect('home')->with('error',"Only admin can access!");
    }

}
