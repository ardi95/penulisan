<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pelajar;
use App\Nilai;
use Auth;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('periksalogin');
        //$this->middleware('periksatambah', ['only' => ['create']]);
    }

    public function index()
    {
        $pelajaran = Auth::user()->nilai_pelajaran;
        $kelas = Auth::user()->ajar_kelas;
        $kelas1 = "$kelas%";
        $nilai = Nilai::select('nilais.id','nilais.pelajar_id','pelajars.NIS','pelajars.kelas','pelajars.nama_lengkap',
            'nilais.pelajaran','nilais.tipe_ujian','nilais.nilai_ujian','nilais.created_at')
        ->join('pelajars','pelajars.id','=','nilais.pelajar_id')->where('pelajaran','=',$pelajaran)->where('kelas','like',$kelas1)
        ->orderBy('created_at','asc')->paginate(10);

        $data['nilai'] = $nilai->setPath('nilai');
        $data['NIS'] = "%";
        $data['nama'] = "%";
        $data['tipe'] = "%";
        $data['detilkelas'] = "%";
        $data['tampilkelas'] = Auth::user()->ajar_kelas;
        return view('Nilai.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Auth::user()->nilai_pelajaran != 'Admin')
        {
            $kunci = Auth::user()->ajar_kelas;
            $kelajar = "$kunci%";
            $data['coba'] = Auth::user();
            $data['pelajar'] = Pelajar::where('kelas','like',$kelajar)->get();
            return view('Nilai.create2',$data);
        }
        $data['coba'] = Auth::user();
        $data['pelajar'] = Pelajar::all();
        return view('Nilai.create',$data);
    }

    public function search(Request $request)
    {
        $pelajaran = Auth::user()->nilai_pelajaran;
        $kelas = Auth::user()->ajar_kelas;
        $kelas1 = "$kelas%";
        $data = $request->all();
        $keywordb = $data['keywordb'];
        $detilkelas = "%$keywordb";
        $keyword = $data['keyword'];
        $keyword2 = $data['keyword2'];
        $keyword4 = $data['keyword4'];
        $keywordnis = "%$keyword%";
        $keywordnama = "%$keyword2%";
        $keywordtipe = "%$keyword4%";
        $nilai = Nilai::select('nilais.id','nilais.pelajar_id','pelajars.NIS','pelajars.kelas','pelajars.nama_lengkap',
            'nilais.pelajaran','nilais.tipe_ujian','nilais.nilai_ujian','nilais.created_at')
        ->join('pelajars','pelajars.id','=','nilais.pelajar_id')->orderBy('created_at','asc')
        ->where('NIS','like',$keywordnis)->where('nama_lengkap','like',$keywordnama)->
        where('pelajaran','=',$pelajaran)->where('tipe_ujian','like',$keywordtipe)
        ->where('kelas','like',$kelas1)->where('kelas','like',$detilkelas)->paginate(10);
        
        $data['nilai'] = $nilai->setPath('nilai');
        $data['NIS'] = $keywordnis;
        $data['nama'] = $keywordnama;
        $data['tipe'] = $keywordtipe;
        $data['detilkelas'] = $detilkelas;
        $data['tampilkelas'] = Auth::user()->ajar_kelas;
        return view('Nilai.index',$data);
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
        $data = $request->all();
        Nilai::create($data);
        return redirect('nilai');
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
        $nilai = Nilai::find($id);
        if($nilai->pelajaran != Auth::user()->nilai_pelajaran)
        {
            return redirect('nilai');
        }
        $data['nilai'] = $nilai;
        return view('Nilai.edit',$data);
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
        $this->validate($request,[
            'nilai_ujian'=>'required|integer']);
        $data = $request->all();
        $nilai = Nilai::find($id);
        $nilai->update($data);
        return redirect('nilai');
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
        $nilai = Nilai::find($id);
        $nilai->delete();
        return redirect('nilai');
    }
}
