<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

class CanInstall
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

        $install = Redis::get('install');
        if($install === null && $request->server('REQUEST_URI') !== '/admin')
        {
            Log::debug($install);
            return redirect()->route('install');
        } 

     
        return $next($request);
    }
}
