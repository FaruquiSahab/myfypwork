<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Response;

class AuthorMiddleware
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
        if ($request->user()->role->name == "Author" )
        {
            return $next($request);
        }
        elseif ($request->user()->role->name == "Admin") {
            return $next($request);
        }
        elseif ($request->user()->role->name == "SuperAdmin") {
            return $next($request);
        }
        return new Response(view('unauthorized'));
        
    }
}
