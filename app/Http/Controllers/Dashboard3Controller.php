<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pelajar;
use App\Nilai;
use Auth;

class Dashboard3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('periksalogin');
    }

    public function index()
    {
        //
        $data['maxinggris'] = Nilai::where('pelajaran','=',"Bahasa Inggris")->max('nilai_ujian');
        $data['maxindonesia'] = Nilai::where('pelajaran','=',"Bahasa Indonesia")->max('nilai_ujian');
        $data['maxips'] = Nilai::where('pelajaran','=',"IPS")->max('nilai_ujian');
        $data['maxipa'] = Nilai::where('pelajaran','=',"IPA")->max('nilai_ujian');
        $data['maxmatematika'] = Nilai::where('pelajaran','=',"Matematika")->max('nilai_ujian');
        $data['banyak'] = Pelajar::count('nama_lengkap');
        return view('dashboard3',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
