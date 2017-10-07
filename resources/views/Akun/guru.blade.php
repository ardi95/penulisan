@extends($template)
@section('content')
<div class="col-sm-6">
<table class="table table-bordered">
	<tr><th colspan="2">Biodata {{$judul}}</th></tr>
	<tr><td>NIP</td><td>{{ $guru->NIP }}</td></tr>
	<tr><td>Nama Lengkap</td><td>{{ $guru->nama_lengkap }}</td></tr>
	<tr><td>Username</td><td>{{ $guru2->email }}</td></tr>
	<tr><td>Spesialisasi</td><td>{{ $guru2->nilai_pelajaran }}</td></tr>
	<tr><td>Pengajar Kelas</td><td>{{ $guru2->ajar_kelas }}</td></tr>
	<tr><td>alamat</td><td>{{ $guru->alamat }}</td></tr>
	<tr><td>Telpon/Handphone</td><td>{{ $guru->telpon_guru }}</td></tr>
	<tr><td>email</td><td>{{ $guru->status_email }}</td></tr>
</table>
</div>
@stop