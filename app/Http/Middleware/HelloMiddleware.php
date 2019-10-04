<?php

namespace App\Http\Middleware;

use Closure;

class HelloMiddleware
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
        $request->session()->put('ttt', 'oooooooooooooooo');
        die("sdsds");
        // Session::put('name', 'hayk');

        // Session:get('name');
        return $next($request);
    }
}
