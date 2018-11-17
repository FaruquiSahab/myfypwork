<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
class UserRole
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
        switch ($request->user()->role->name)
        {
            case 'SuperAdmin':
            if ($request->user()->role->name == "SuperAdmin")
            {
                return $next($request);
            }
            break;
            case 'Admin':
            if ($request->user()->role->name == "Admin")
            {
                return $next($request);
            }
            break;
            case 'Author':
            if ($request->user()->role->name == "Author")
            {
                return $next($request);
            }
            break;
            case 'Editor':
            if ($request->user()->role->name == "Editor")
            {
                return $next($request);
            }
            break;
            case 'Subscriber':
            if ($request->user()->role->name == "Subscriber")
            {
                return $next($request);
            }
            break;
            default:
            // return new Response(view('layouts.admin'));
            return new Response(view('unauthorized'));
        }
        return new Response(view('unauthorized'));
    }
}
