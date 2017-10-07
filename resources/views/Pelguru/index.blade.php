@extends('template.master')
@section('content')

<h3>Cari dengan kata kunci</h3>
<hr>
{!! Form::open(array('url'=>'pelgurusearch')) !!}
{!! Form::text('keyword','',['class'=>'form-control','placeholder'=>'masukan kata kunci']) !!}
<br>
<h4><b>Lihat Berdasarkan:</b></h4>
{!! Form::select('keyworda',array('NIS'=>'NIS','nama_lengkap'=>'Nama'),'',['class'=>'form-control']) !!}
<br>
{!! Form::select('keywordb',array(''=>'Pilih Kelas','1'=>"$tampilkelas-1",'2'=>"$tampilkelas-2",'3'=>"$tampilkelas-3",'4'=>"$tampilkelas-4",'5'=>"$tampilkelas-5"),'',['class'=>'form-control']) !!}
{!! Form::submit('Cari!',['class'=>'btn btn-info btn-sm']) !!}
{!! Form::close() !!}
<hr>
<table class="table table-bordered">
	<?php $no; ?>
	<tr><th>No</th><th>NIS</th><th>Nama</th><th>Kelas</th><th>option</th></tr>
	@foreach($pelguru as $p)
	<tr>
	<td>{{ $no }}</td>
	<td>{{ $p->NIS }}</td>
	<td>{{ $p->nama_lengkap }}</td>
	<td>{{ $p->kelas }}</td>
	<td>{!! link_to('pelajar/'.$p->id,'Input Nilai',['class'=>'btn btn-warning btn-sm']) !!}</td>
	</tr>
	<?php $no++; ?>
	@endforeach
</table>
{!! $pelguru->render() !!}

@stop