@extends('template.admin')
@section('content')

<h3>Cari dengan kata kunci</h3>
<hr>
{!! Form::open(array('url'=>'pelajarsearch')) !!}
{!! Form::text('keyword','',['class'=>'form-control','placeholder'=>'masukan kata kunci']) !!}
<br>
<h4><b>Lihat Berdasarkan:</b></h4>
{!! Form::select('keyworda',array('NIS'=>'NIS','nama_lengkap'=>'Nama','kelas'=>'Kelas'),'',['class'=>'form-control']) !!}
{!! Form::submit('Cari!',['class'=>'btn btn-info btn-sm']) !!}
{!! Form::close() !!}
<hr>
{!! link_to('pelajar/create','Tambah Data Pelajar',['class'=>'btn btn-primary btn-lg']) !!}
<table class="table table-bordered">
	<?php $no=1; ?>
	<tr><th>No</th><th>NIS</th><th>Nama</th><th>Kelas</th><th>Option</th></tr>
	@foreach($pelajar as $p)
	<tr>
	<td>{{ $no }}</td>
	<td>{{ $p->NIS }}</td>
	<td>{{ $p->nama_lengkap }}</td>
	<td>{{ $p->kelas }}</td>
	<td>{!! link_to('pelajar/'.$p->id.'/edit','Edit',['class'=>'btn btn-default btn-sm']) !!}
	{!! link_to('peladmin/'.$p->id,'Detail',['class'=>'btn btn-default btn-sm']) !!}
	{!! Form::open(array('method'=>'delete','url'=>'pelajar/'.$p->id))!!}
	{!!	Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])!!}
	{!!	Form::hidden('_delete','DELETE')!!}
	{!!	Form::close()!!}
	</td>
	</tr>
	<?php $no++; ?>
	@endforeach
</table>
{!! $pelajar->render() !!}

@stop