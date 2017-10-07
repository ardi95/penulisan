<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePelajar;
use App\Pelajar;
use App\Nilai;
use App\User;
use Auth;

use Input;

class PelajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('periksalogin');
        $this->middleware('harusadmin', ['except' => ['show','Nilai','store']]);
    }
    
    public function index()
    {
        //
        $pelajar = Pelajar::orderBy('created_at','asc')->paginate(4);
        $data['pelajar'] = $pelajar->setPath('pelajar');
        return view('Pelajar.index',$data);
    }

    public function status_login()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            echo "sudah login";
        }
        else
        {
            echo "belum login";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Pelajar.create');
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
        $this->validate($request,[
            'NIS' => 'required|unique:pelajars',
            'nama_lengkap' => 'required|max:255',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'alamat' => 'required',
            'status_email' => 'required',
            'telpon_pelajar' => 'required',
            ]);
        $data = $request->all();
        $pelajar = Pelajar::create([
            'NIS' => $data['NIS'],
            'nama_lengkap' => $data['nama_lengkap'],
            'kelas' => $data['kelas'],
            'alamat' => $data['alamat'],
            'status_email' => $data['status_email'],
            'telpon_pelajar' => $data['telpon_pelajar'],
        ]);
        //$datas['email'] = $data['NIS'];
        $data['nilai_pelajaran'] = 'user';
        $data['level'] = 'pelajar';
        //$datas['password'] = 'sukamaju';
        //$ids = Pelajar::firstOrCreate(['NIS' => $data['NIS']])->$id;
        
        $data['pelajar_id'] = $pelajar->id;
        User::create([
            'name' => $data['nama_lengkap'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'nilai_pelajaran' => $data['nilai_pelajaran'],
            'pelajar_id' => $data['pelajar_id'],
            'level' => $data['level'],
        ]);
        //$cobac['pelajar'] = Pelajar::find($doba->id);
        return redirect('pelajar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        $data = $request->all();
        $keyword = $data['keyword'];
        $keyworda = $data['keyworda'];
        $keywordv = "%$keyword%";
        $pelajar = Pelajar::where($keyworda,'like',$keywordv)->orderBy('created_at','asc')->paginate(4);
        $data['pelajar'] = $pelajar->setPath('pelajar');
        return view('Pelajar.index',$data);
    }

    public function show($id)
    {
        $pelajaran1 = Auth::user()->nilai_pelajaran;
        $nilai = Nilai::select('nilais.id','nilais.pelajar_id','pelajars.NIS','pelajars.nama_lengkap',
            'nilais.pelajaran','nilais.tipe_ujian','nilais.nilai_ujian','nilais.created_at')
        ->leftjoin('pelajars','pelajars.id','=','nilais.pelajar_id')->where('nilais.pelajar_id','=',$id)->
        where('nilais.pelajaran','=',$pelajaran1)->get();
        $data['nilai'] = $nilai;
        $data['pelajar'] = Pelajar::find($id);
        if(Auth::user()->nilai_pelajaran == 'Admin')
        {
            $template = 'template.admin';
        }
        else
        {
            $template = 'template.master';
        }
        $data['template'] = $template;
        return view('Pelajar.show',$data);
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
        $data['pelajar'] = User::join('pelajars','pelajars.id','=','users.pelajar_id')->where('pelajars.id','=',$id)->first();
        return view('Pelajar.edit',$data);
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
            'NIS' => 'required',
            'nama_lengkap' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|confirmed|min:6',
            'alamat' => 'required',
            'status_email' => 'required',
            'telpon_pelajar' => 'required',
            ]);
        $data = $request->all();
        $pelajar = Pelajar::find($id);
        $pelajar2 = Pelajar::find($id)->users;
        $data1 = array(
            'NIS' => $data['NIS'],
            'nama_lengkap' => $data['nama_lengkap'],
            'kelas' => $data['kelas'],
            'alamat' => $data['alamat'],
            'status_email' => $data['status_email'],
            'telpon_pelajar' => $data['telpon_pelajar']
        );
        $pelajar->update($data1);

        $data['nilai_pelajaran'] = 'user';
        $data['level'] = 'pelajar';
        $data['pelajar_id'] = $pelajar->id;
        $data2 = array(
            'name' => $data['nama_lengkap'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'nilai_pelajaran' => $data['nilai_pelajaran'],
            'pelajar_id' => $data['pelajar_id'],
            'level' => $data['level']
        );
        $pelajar2->update($data2);

        return redirect('pelajar');
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
        $pelajar_id = $id;
        $pelajar = Pelajar::find($id);
        $pelajar->delete();
        $nilai = Nilai::where('pelajar_id','=',$pelajar_id);
        $nilai->delete();
        $user = User::where('pelajar_id','=',$pelajar_id);
        $user->delete();
        return redirect('pelajar');
    }

    public function Nilai(Request $request)
    {
        $data = $request->all();
        $coba = $request->pelajar_id;
        Nilai::create($data);
        return redirect("pelajar/$coba");
    }

    public function coba()
    {
        $data['pelajar'] = Pelajar::all();
        return view('Pelajar.coba',$data);
    }
}
