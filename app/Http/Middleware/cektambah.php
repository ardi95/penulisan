<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Pelajar;

class cektambah
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
        if(Auth::user()->nilai_pelajaran != 'Admin')
        {
            $kunci = Auth::user()->ajar_kelas;
            $kelajar = "$kunci%";
            $data['coba'] = Auth::user();
            $data['pelajar'] = Pelajar::all()->where('kelas','like',$kelajar);
            return view('Nilai.create2',$data);
        }
        return $next($request);
    }
}
