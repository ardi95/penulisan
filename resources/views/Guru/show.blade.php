@extends('template.admin')
@section('content')
<div class="col-sm-6">
<table class="table table-bordered">
	<tr><th colspan="2">Biodata Guru</th></tr>
	<tr><td>NIG</td><td>{{ $guru->id }}</td></tr>
	<tr><td>Nama Lengkap</td><td>{{ $guru->nama_lengkap }}</td></tr>
	<tr><td>Username</td><td>{{ $guru2->email }}</td></tr>
	<tr><td>Pengajar Mata Pelajaran</td><td>{{ $guru2->nilai_pelajaran }}</td></tr>
	<tr><td>Pengajar Kelas</td><td>{{ $guru2->ajar_kelas }}</td></tr>
	<tr><td>alamat</td><td>{{ $guru->alamat }}</td></tr>
	<tr><td>email</td><td>{{ $guru->status_email }}</td></tr>
</table>
</div>
@stop