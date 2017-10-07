<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelajar extends Model
{
    //
    protected $fillable=['NIS','nama_lengkap','kelas','alamat','status_email','telpon_pelajar','foto'];

    public function nilai()
    {
    	return hasMany('App\Nilai');
    }

    public function users()
    {
    	return $this->hasOne('App\User');
    }
}
