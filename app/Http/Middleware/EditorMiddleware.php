<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Response;

class EditorMiddleware
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
        if ($request->user()->role->name == "Editor")
        {
            return $next($request);
        }
        return new Response(view('unauthorized'));
        
    }
}
