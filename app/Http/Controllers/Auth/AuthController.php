<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Guru;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    protected $redirectPath = 'dashboard2';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'nilai_pelajaran' => 'required',
            'ajar_kelas' => 'required',
            'alamat' => 'required',
            'status_email' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $guru = Guru::create([
            'nama_lengkap' => $data['name'],
            'alamat' => $data['alamat'],
            'status_email' => $data['status_email'],
        ]);
        $data['guru_id'] = $guru->id;
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'nilai_pelajaran' => $data['nilai_pelajaran'],
            'ajar_kelas' => $data['ajar_kelas'],
            'guru_id' => $data['guru_id'],
            'level' => $data['level'],
        ]);
    }
}
