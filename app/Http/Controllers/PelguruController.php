<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pelajar;
use App\Nilai;
use Auth;
use Input;

class PelguruController extends Controller
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
        $kelas1 = Auth::user()->ajar_kelas;
        $kelas2 = "$kelas1%";
        $pelguru = Pelajar::where('kelas','like',$kelas2)->orderBy('created_at','asc')->paginate(2);
        $data['pelguru'] = $pelguru->setPath('pelguru');
        $data['tampilkelas'] = Auth::user()->ajar_kelas;
        $data['terus'] = "_2";
        if (Input::has('page'))
        {
            $halaman = Input::get('page') ; // maka variabel $halaman sama dengan nilai dari variabel page
        }
        else // jika tidak ada variabel page
        {
            $halaman = 1 ; // maka variabel $halaman bernilai 1
        }
 
        $data['no'] = 2 *$halaman  - 1 ;
        return view('Pelguru.index',$data);
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

    public function search(Request $request)
    {
        $data = $request->all();
        $kelas1 = Auth::user()->ajar_kelas;
        $kelas2 = "$kelas1%";
        $keyword = $data['keyword'];
        $keyworda = $data['keyworda'];
        $keywordb = $data['keywordb'];
        $keywordb1 = "%$keywordb";
        $keywordv = "%$keyword%";
        $pelguru = Pelajar::where('kelas','like',$kelas2)->where($keyworda,'like',$keywordv)->where('kelas','like',$keywordb1)
        ->orderBy('created_at','asc')->paginate(4);
        $data['pelguru'] = $pelguru->setPath('pelguru');
        $data['tampilkelas'] = Auth::user()->ajar_kelas;
        if (Input::has('page'))
        {
            $halaman = Input::get('page') ; // maka variabel $halaman sama dengan nilai dari variabel page
        }
        else // jika tidak ada variabel page
        {
            $halaman = 1 ; // maka variabel $halaman bernilai 1
        }
 
        $data['no'] = 2 *$halaman  - 1 ;
        return view('Pelguru.index',$data);
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
