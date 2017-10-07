<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    //
    protected $fillable=['nama_lengkap','alamat','telpon_guru','status_email','NIP','foto'];

    public function usersguru()
    {
    	return $this->hasOne('App\User');
    }
}
