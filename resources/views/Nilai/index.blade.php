@extends('template.master')
@section('content')

<h3>Cari dengan kata kunci</h3>
<hr>
{!! Form::open(array('url'=>'nilaisearch')) !!}
{!! Form::text('keyword','',['class'=>'form-control','placeholder'=>'Masukan NIS']) !!}
<br>
{!! Form::text('keyword2','',['class'=>'form-control','placeholder'=>'Masukan nama']) !!}
<br>
{!! Form::select('keyword4',array(''=>'Pilih Tipe Ujian','UTS'=>'UTS','UAS'=>'UAS'),'',['class'=>'form-control']) !!}
<br>
{!! Form::select('keywordb',array(''=>'Pilih Kelas','1'=>"$tampilkelas-1",'2'=>"$tampilkelas-2",'3'=>"$tampilkelas-3",'4'=>"$tampilkelas-4",'5'=>"$tampilkelas-5"),'',['class'=>'form-control']) !!}
{!! Form::submit('Cari!',['class'=>'btn btn-info btn-sm']) !!}
{!! Form::close() !!}
<div style="text-align:center;">
<img src="{{ asset('foto/tabelnilai.png') }}">
</div>
<br>
<br>
<table class="table table-striped">
	<tr><th>NIS</th><th>Nama</th><th>Kelas</th><th>Tipe Ujian</th><th>Nilai</th><th>option</th></tr>
	@foreach($nilai as $n)
	<tr>
	<td>{{ $n->NIS }}</td>
	<td>{{ $n->nama_lengkap }}</td>
	<td>{{ $n->kelas }}</td>
	<td>{{ $n->tipe_ujian }}</td>
	<td>{{ $n->nilai_ujian }}</td>
	<td>{!! link_to('nilai/'.$n->id.'/edit','Edit',['class'=>'btn btn-default btn-sm']) !!}
	{!! Form::open(array('method'=>'delete','url'=>'nilai/'.$n->id))!!}
	{!!	Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])!!}
	{!!	Form::hidden('_delete','DELETE')!!}
	{!!	Form::close()!!}</td>
	</tr>
	@endforeach
</table>

{!! $nilai->render() !!}

{!! Form::open(array('url'=>'export2')) !!}
{!! Form::hidden('keywordnis', $NIS) !!}
{!! Form::hidden('keywordnama', $nama) !!}
{!! Form::hidden('keywordtipe', $tipe) !!}
{!! Form::hidden('keywordb', $detilkelas) !!}
{!! Form::submit('Download Laporan',['class'=>'btn btn-danger btn-sm']) !!}
{!! Form::close()!!}
@stop