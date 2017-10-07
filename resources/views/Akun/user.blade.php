@extends('template.guest')
@section('content')
<div class="col-sm-6">
<table class="table table-bordered">
	<tr><th colspan='2'>Biodata Pelajar</th></tr>
	<tr><td width="120">NIS</td><td>{{ $pelajar->NIS }}</td></tr>
	<tr><td>Nama Lengkap</td><td>{{ $pelajar2->name }}</td></tr>
	<tr><td>Username</td><td>{{ $pelajar2->email }}</td></tr>
	<tr><td>Kelas</td><td>{{ $pelajar->kelas }}</td></tr>
	<tr><td>alamat</td><td>{{ $pelajar->alamat }}</td></tr>
	<tr><td>Telpon/Handphone</td><td>{{ $pelajar->telpon_pelajar }}</td></tr>
	<tr><td>email</td><td>{{ $pelajar->status_email }}</td></tr>
</table>
</div>
@stop