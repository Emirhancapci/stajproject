<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function auth(Request $request, Closure $next) : Response
    {
        if(Auth::check())
        {
            return $next($request);
        }else{
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }

}
