<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class cekadmin
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
        if(Auth::user()->nilai_pelajaran == 'Admin')
        {
            return redirect('dashboard3');
        }
        return $next($request);
    }
}
