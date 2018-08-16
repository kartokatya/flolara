<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
        if(!Auth::user()){
            return redirect('/login');

        }elseif(Auth::user()->isAdmin==1 ){
            return abort(404);
        }else{
            return $next($request);
        }
        return $next($request);
    }
}
