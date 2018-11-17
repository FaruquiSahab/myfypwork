<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Response;
class SuperAdminMiddleware
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
        if ($request->user()->role->name != "SuperAdmin")
        {
            return new Response(view('unauthorized'));
        }
        return $next($request);
    }
}
