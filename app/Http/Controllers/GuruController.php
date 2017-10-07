<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Guru;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('periksalogin');
        $this->middleware('harusadmin');
    }

    public function index()
    {
        //
        $guru = Guru::select('gurus.id','users.name','users.ajar_kelas','users.nilai_pelajaran','gurus.NIP','users.created_at')
        ->join('users','gurus.id','=','users.guru_id')
        ->where('nilai_pelajaran','!=','user')->orderBy('created_at','asc')->paginate(4);
        $data['guru'] = $guru->setPath('guru');
        return view('Guru.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $data = $request->all();
        $keyword = $data['keyword'];
        $keyworda = $data['keyworda'];
        $keywordv = "%$keyword%";
        $guru = User::where('nilai_pelajaran','!=','user')->where($keyworda,'like',$keywordv)->orderBy('created_at','asc')->paginate(4);
        $data['guru'] = $guru->setPath('guru');
        return view('Guru.index',$data);
    }

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
        $data['guru'] = Guru::find($id);
        $data['guru2'] = Guru::find($id)->usersguru;
        return view('Guru.show',$data);
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
        $data['guru'] = User::join('gurus','gurus.id','=','users.guru_id')->where('gurus.id','=',$id)->first();
        return view('Guru.edit',$data);
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
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|confirmed|min:6',
            'nilai_pelajaran' => 'required',
            'ajar_kelas' => 'required',
            'alamat' => 'required',
            'NIP' => 'required',
            'telpon_guru' => 'required',
            'status_email' => 'required',
            ]);
        $data = $request->all();
        $guru = Guru::find($id);
        $guru2 = Guru::find($id)->usersguru;
        $data1 = array(
            'nama_lengkap' => $data['name'],
            'alamat' => $data['alamat'],
            'status_email' => $data['status_email'],
            'NIP' => $data['NIP'],
            'telpon_guru' => $data['telpon_guru']
        );
        $guru->update($data1);

        $data['guru_id'] = $guru->id;
        $data['level'] = 'guru';

        $data2 = array(
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'nilai_pelajaran' => $data['nilai_pelajaran'],
            'ajar_kelas' => $data['ajar_kelas'],
            'guru_id' => $data['guru_id'],
            'level' => $data['level']
        );
        $guru2->update($data2);

        return redirect('guru');
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
        $guru = Guru::find($id);
        $guru->delete();
        $user = User::where('guru_id','=',$id);
        $user->delete();
        return redirect('guru');
    }
}
