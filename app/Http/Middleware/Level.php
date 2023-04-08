<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Level
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$levels): Response
    {
        if (in_array($request->user()->level, $levels)) {
            return $next($request);
        }
        if (Auth::user()->level == 'admin') {
            return Redirect::to('dashboard');
        }elseif (Auth::user()->level == 'owner') {
            return Redirect::to('dashboard');
        }

    }
}
