<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('/','DashboardController');

Route::resource('dashboard','DashboardController');
Route::resource('dashboard2','Dashboard2Controller');
Route::resource('dashboard3','Dashboard3Controller');

Route::resource('awal','AwalController');
Route::post('search','AwalController@search');
Route::resource('kedua','KeduaController');
Route::post('keduasearch','KeduaController@search');
Route::resource('pelajar','PelajarController');
Route::post('pelajarsearch','PelajarController@search');
Route::resource('guru','GuruController');
Route::post('gurusearch','GuruController@search');
//Route::get('coba','PelajarController@coba');
Route::resource('nilai','NilaiController');
Route::post('nilaisearch','NilaiController@search');

Route::resource('pelguru','PelguruController');
Route::post('pelgurusearch','PelguruController@search');


Route::get('export','LaporanController@utama');
Route::post('export2','LaporanController@excel');
Route::get('import','LaporanController@formexcel');
Route::post('import2','LaporanController@prosesexcel');
Route::get('peladmin/{pelajar}','LaporanController@show');
Route::get('showuser','LaporanController@showuser');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('regadmin','LaporanController@regadmin');
Route::post('postregadmin','LaporanController@postregadmin');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('chek','AwalController@status_login');
Route::post('inputnilai','PelajarController@Nilai');

Route::get('cobad','LaporanController@coba');
Route::get('cobad2','LaporanController@coba2');

Route::get('daftar/{pelajar}','DaftarController@daftar');

Route::get('tes','AwalController@tes');
Route::get('awalpdf','AwalController@pdf');