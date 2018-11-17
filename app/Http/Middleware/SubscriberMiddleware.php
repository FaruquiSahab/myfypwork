<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Response;

class SubscriberMiddleware
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
        if ($request->user()->role->name != "Subscriber" )
        {
            return new Response(view('unauthorized'));
        }
        return $next($request);
    }
}
