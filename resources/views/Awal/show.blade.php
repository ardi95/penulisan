@extends('template.guest')
@section('content')
<div class="row">
<div class="col-sm-6">
<table class="table table-bordered">

	<tr><td width="120">NIS</td><td>{{ $awal->NIS }}</td></tr>
	<tr><td>Nama Lengkap</td><td>{{ $awal->nama_lengkap }}</td></tr>
	<tr><td>Kelas</td><td>{{ $awal->kelas }}</td></tr>

</table>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<table class="table table-bordered">
	<tr><th>Pelajaran</th><th>Tipe Ujian</th><th>Nilai</th></tr>
	@foreach($nilair as $n)
	<tr>
	<td>{{ $n->pelajaran }}</td>
	<td>{{ $n->tipe_ujian }}</td>
	<td>{{ $n->nilai_ujian }}</td>
	</tr>
	@endforeach
</table>
</div>
</div>
<br>
{!! link_to('awalpdf','Download Nilai Ujian',['class'=>'btn btn-primary btn-lg']) !!}
@stop