<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelajarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelajars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NIS',8)->unique;
            $table->string('nama_lengkap',100);
            $table->string('kelas',3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pelajars');
    }
}
