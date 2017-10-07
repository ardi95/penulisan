<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    //
    protected $fillable=['pelajar_id','pelajaran','tipe_ujian','nilai_ujian'];

    public function pelajar()
    {
    	return belongsTo('App\Pelajar');
    }
}
