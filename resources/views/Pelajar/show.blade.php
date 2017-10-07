@extends($template)
@section('content')
<div class="col-sm-6">
<table class="table table-bordered">
	<tr><th colspan='2'>Biodata Siswa</th></tr>
	<tr><td width="120">NIS</td><td>{{ $pelajar->NIS }}</td></tr>
	<tr><td>Nama Lengkap</td><td>{{ $pelajar->nama_lengkap }}</td></tr>
	<tr><td>Kelas</td><td>{{ $pelajar->kelas }}</td></tr>
</table>
</div>
<div class="col-sm-6">
{!! Form::open(array('url'=>'inputnilai')) !!}
{!! Form::hidden('pelajar_id',$pelajar->id) !!}
{!! Form::hidden('pelajaran',Auth::user()->nilai_pelajaran) !!}
<table class="table table-bordered">
	<tr><th colspan='2'>Input Nilai</th></tr>
	<tr><td>Tipe Ujian</td><td>{!! Form::select('tipe_ujian',array('UTS'=>'UTS','UAS'=>'UAS'),'',['class'=>'form-control']) !!}</td>
	<tr><td>Nilai</td><td>{!! Form::text('nilai_ujian',null,['class'=>'form-control']) !!}</td>
	<tr><td colspan="2"> {!! Form::submit('masukkan nilai',['class'=>'btn btn-danger btn-sm'])!!}</td></tr>
	{!!Form::close()!!}
</table>
</div>
<div class="col-sm-12">
<table class="table table-bordered">
	<tr><th>Pelajaran</th><th>Tipe Ujian</th><th>Nilai</th></tr>
	@foreach($nilai as $n)
	<tr>
	<td>{{ $n->pelajaran }}</td>
	<td>{{ $n->tipe_ujian }}</td>
	<td>{{ $n->nilai_ujian }}</td>
	</tr>
	@endforeach
</table>
</div>

@stop