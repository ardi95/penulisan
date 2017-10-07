<?php

use Illuminate\Database\Seeder;

class CreatePelajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();

        DB::table('users')->insert(array(
        	array('name'=>'ardiansyah', 'email'=>'ardiansyah.pratama95@gmail.com', 'password'=>'24april1995')
        	));
    }
}
