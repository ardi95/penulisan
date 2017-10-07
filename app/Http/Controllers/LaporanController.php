<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Nilai;
use App\Pelajar;
use App\User;
use App\Guru;
use Excel;
use Auth;
use DB;
use Input;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('periksalogin');
        $this->middleware('harusadmin',['only'=>['regadmin','postregadmin']]);
    }

    public function utama()
    {
        $data['tampilkelas'] = Auth::user()->ajar_kelas;  
        return view('Laporan.download',$data);
    }


    public function excel(Request $request)
    {
        //
        $data = $request->all();
        $pelajaran = Auth::user()->nilai_pelajaran;
        $kelas = Auth::user()->ajar_kelas;
        $kelas1 = "$kelas%";
        $keywordb = $data['keywordb'];
        $detilkelas = "%$keywordb";
        $keywordnama = $data['keywordnama'];
        $keywordnis = $data['keywordnis'];
        $keywordtipe = $data['keywordtipe'];
        $nilai = Nilai::select('nilais.id','nilais.pelajar_id','pelajars.NIS','pelajars.kelas','pelajars.nama_lengkap','nilais.pelajaran','nilais.tipe_ujian','nilais.nilai_ujian','nilais.created_at')
        ->join('pelajars','pelajars.id','=','nilais.pelajar_id')->orderBy('created_at','asc')
        ->where('NIS','like',$keywordnis)->where('nama_lengkap','like',$keywordnama)->
        where('pelajaran','=',$pelajaran)->where('tipe_ujian','like',$keywordtipe)
        ->where('kelas','like',$kelas1)->where('kelas','like',$detilkelas)->get();

        \Excel::create('Data Nilai',function($excel) use ($nilai)
        {
            $excel->sheet('data nilai',function($sheet) use ($nilai)
            {
                $row=1;
                $sheet->row($row,array(
                    'No','NIS','Nama','Kelas','Pelajaran','Tipe Ujian','Nilai'));
                $no=1;
                foreach ($nilai as $n){
                    $sheet->row(++$row,array(
                        $no,
                        $n->NIS,
                        $n->nama_lengkap,
                        $n->kelas,
                        $n->pelajaran,
                        $n->tipe_ujian,
                        $n->nilai_ujian));
                    $no++;
                }
            });
        })->export('xls');
    }

    public function formexcel()
    {
        return view('Laporan.form');
    }


    public function prosesexcel(Request $request)
    {
        $file = Input::file('data');

        /* Upload ambil file excel kemudia simpan ke dalam               Mahasiswa */
        Excel::load($file,function($reader)
        {
            $reader->each(function($sheet)
            {
                Nilai::firstOrCreate($sheet->toArray());
            });
        /* Jika berhasil akan muncul pesan */
        });
        return redirect('nilai');
    }

    public function coba()
    {
        return view ('Laporan.coba');
    }

    public function coba2()
    {
        $file_path = public_path('download/RAY-TRACING-GRAFKOM.pdf');
        return response()->download('RAY-TRACING-GRAFKOM');
    }

    public function regadmin()
    {
        return view('auth.regadmin');
    }

    public function postregadmin(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'nilai_pelajaran' => 'required',
            'ajar_kelas' => 'required',
            'alamat' => 'required',
            'NIP' => 'required',
            'telpon_guru' => 'required',
            'status_email' => 'required',
            ]);

        $data = $request->all();
        $guru = Guru::create([
            'nama_lengkap' => $data['name'],
            'alamat' => $data['alamat'],
            'status_email' => $data['status_email'],
            'NIP' => $data['NIP'],
            'telpon_guru' => $data['telpon_guru'],
        ]);
        $data['guru_id'] = $guru->id;
        $data['level'] = 'guru';
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'nilai_pelajaran' => $data['nilai_pelajaran'],
            'ajar_kelas' => $data['ajar_kelas'],
            'guru_id' => $data['guru_id'],
            'level' => $data['level'],
        ]);
        return redirect('guru');
    }

    public function show($id)
    {
        $data['peladmin'] = Pelajar::find($id);
        $data['peladmin2'] = Pelajar::find($id)->users;
        return view ('Pelajar.show2',$data);
    }

    public function showuser()
    {
        if(Auth::user()->nilai_pelajaran == 'user')
        {
            $id = Auth::user()->pelajar_id;
            $data['pelajar'] = Pelajar::find($id);
            $data['pelajar2'] = Pelajar::find($id)->users;
            return view ('Akun.user',$data);
        }
        else
        {
            if(Auth::user()->nilai_pelajaran == 'Admin')
            {
                $data['template'] = 'template.admin';
                $data['judul'] = 'Admin';
            }
            else
            {
                $data['template'] = 'template.master';
                $data['judul'] = 'Guru';   
            }
            $id = Auth::user()->guru_id;
            $data['guru'] = Guru::find($id);
            $data['guru2'] = Guru::find($id)->usersguru;
            return view ('Akun.guru',$data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
}
