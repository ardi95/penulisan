<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pelajar;
use App\Nilai;

class KeduaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kedua = Nilai::select('nilais.id','nilais.pelajar_id','pelajars.NIS','pelajars.kelas','pelajars.nama_lengkap',
            'nilais.pelajaran','nilais.tipe_ujian','nilais.nilai_ujian','nilais.created_at')
        ->join('pelajars','pelajars.id','=','nilais.pelajar_id')->orderBy('created_at','asc')->paginate(10);

        $data['kedua'] = $kedua->setPath('kedua');
        return view('Kedua.index',$data);
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

    public function search(Request $request)
    {
        $data = $request->all();
        $keyword = $data['keyword'];
        $keyword2 = $data['keyword2'];
        $keyword3 = $data['keyword3'];
        $keyword4 = $data['keyword4'];
        $keyword5 = $data['keyword5'];
        $keywordnis = "%$keyword%";
        $keywordnama = "%$keyword2%";
        $keywordpelajaran = "%$keyword3%";
        $keywordtipe = "%$keyword4%";
        $keywordkelas = "%$keyword5%";
        $kedua = Nilai::select('pelajars.id','nilais.pelajar_id','pelajars.NIS','pelajars.nama_lengkap',
            'nilais.pelajaran','nilais.tipe_ujian','nilais.nilai_ujian','nilais.created_at')
        ->join('pelajars','pelajars.id','=','nilais.pelajar_id')->orderBy('created_at','asc')
        ->where('NIS','like',$keywordnis)->where('nama_lengkap','like',$keywordnama)->
        where('pelajaran','like',$keywordpelajaran)->where('tipe_ujian','like',$keywordtipe)->
        where('kelas','like',$keywordkelas)->paginate(10);
        
        $data['kedua'] = $nilai->setPath('kedua');
        return view('Kedua.index',$data);
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
