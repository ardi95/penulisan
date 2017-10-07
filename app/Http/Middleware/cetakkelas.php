<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class cetakkelas
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
        if(Auth::user()->ajar_kelas )
        return $next($request);
    }
}
