<?php

namespace App\Http\Middleware;
use App\User;
use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RoleVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   if(Auth::check()){
             $user  = Auth::user();
        if( !Auth::user()->isAdmin())
        {
            return   new Response(view('errors.403',["exception"=>"exception"]));
        }
    }

        return $next($request);
    }
}
