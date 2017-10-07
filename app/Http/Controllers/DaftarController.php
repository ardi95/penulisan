<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pelajar;
use App\User;

class DaftarController extends Controller
{
    //
    public function daftar($id)
    {
    	$pelajar = Pelajar::find($id);
    	$data['name'] = $pelajar->nama_lengkap;
    	$data['email'] = $pelajar->NIS;
    	$data['nilai_pelajaran'] = 'user';
    	$data['password'] = 'sukamaju';
    	$data['user_id'] = $pelajar->id;
    	$data['cek_daftar'] = '1';
    	User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'nilai_pelajaran' => $data['nilai_pelajaran'],
            'user_id' => $data['user_id'],
            'cek_daftar' => $data['cek_daftar'],
        ]);

        return redirect('pelajar');
    }
}
