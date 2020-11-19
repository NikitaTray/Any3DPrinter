<?php

namespace App\Http\Middleware;

use Closure;

class PrinterAuthenticate
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
        if(is_null(session('printer')))
            return redirect('select');
        return $next($request);
    }
}
