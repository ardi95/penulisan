@extends('template.guest')
@section('content')

{!! Form::open(array('url'=>'keduasearch')) !!}
{!! Form::text('keyword','',['class'=>'form-control','placeholder'=>'Masukan NIS']) !!}
<br>
{!! Form::text('keyword2','',['class'=>'form-control','placeholder'=>'Masukan nama']) !!}
<br>
{!! Form::select('keyword5',array(''=>'Pilih kelas','9_1'=>'9_1','9_2'=>'9_2','9_3'=>'9_3','9_4'=>'9_4','9_5'=>'9_5'),'',['class'=>'form-control']) !!}
<br>
{!! Form::select('keyword3',array('Matematika'=>'Matematika','IPA'=>'IPA','IPS'=>'IPS','Bahasa Inggris'=>'Bahasa Inggris','Bahasa Indonesia'=>'Bahasa Indonesia'),'',['class'=>'form-control']) !!}
<br>
{!! Form::select('keyword4',array('UTS'=>'UTS','UAS'=>'UAS'),'',['class'=>'form-control']) !!}
<br>
{!! Form::submit('Cari!',['class'=>'btn btn-danger btn-sm']) !!}
{!! Form::close() !!}
<hr>
<table class="table table-bordered">
	<tr><th>NIS</th><th>Nama</th><th>Kelas</th><th>Pelajaran</th><th>Tipe Ujian</th><th>Nilai</th></tr>
	@foreach($kedua as $n)
	<tr>
	<td>{{ $n->NIS }}</td>
	<td>{{ $n->nama_lengkap }}</td>
	<td>{{ $n->kelas }}</td>
	<td>{{ $n->pelajaran }}</td>
	<td>{{ $n->tipe_ujian }}</td>
	<td>{{ $n->nilai_ujian }}</td>
	</tr>
	@endforeach
</table>

{!! $kedua->render() !!}

@stop