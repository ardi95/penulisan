@extends('template.admin')
@section('content')
<div class="col-sm-6">
<table class="table table-bordered">
	<tr><th colspan='2'>Biodata Siswa</th></tr>
	<tr><td width="120">NIS</td><td>{{ $peladmin->NIS }}</td></tr>
	<tr><td>Nama Lengkap</td><td>{{ $peladmin2->name }}</td></tr>
	<tr><td>Username</td><td>{{ $peladmin2->email }}</td></tr>
	<tr><td>Kelas</td><td>{{ $peladmin->kelas }}</td></tr>
	<tr><td>alamat</td><td>{{ $peladmin->alamat }}</td></tr>
	<tr><td>email</td><td>{{ $peladmin->status_email }}</td></tr>
</table>
</div>
@stop