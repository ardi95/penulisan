@extends('template.admin')
@section('content')

<h3>Cari dengan kata kunci</h3>
<hr>
{!! Form::open(array('url'=>'gurusearch')) !!}
{!! Form::text('keyword','',['class'=>'form-control','placeholder'=>'masukan kata kunci']) !!}
<br>
<h4><b>Lihat Berdasarkan:</b></h4>
{!! Form::select('keyworda',array('id'=>'NIG','email'=>'Username','name'=>'Nama Guru','nilai_pelajaran'=>'Pengajar Mata Pelajaran'),'',['class'=>'form-control']) !!}
{!! Form::submit('Cari!',['class'=>'btn btn-info btn-sm']) !!}
{!! Form::close() !!}
<hr>
{!! link_to('regadmin','Tambah Data Guru',['class'=>'btn btn-primary btn-lg']) !!}
<br>
<table class="table table-bordered">
	<?php $no=1; ?>
	<tr><th>No</th><th>NIP</th><th>Nama</th><th>Menangani Kelas</th><th>Spesialisasi</th><th>Option</th></tr>
	@foreach($guru as $g)
	<tr>
	<td>{{ $no }}</td>
	<td>{{ $g->NIP }}</td>
	<td>{{ $g->name }}</td>
	<td>{{ $g->ajar_kelas }}</td>
	<td>{{ $g->nilai_pelajaran }}</td>
	<td>{!! link_to('guru/'.$g->id.'/edit','Edit',['class'=>'btn btn-default btn-sm']) !!}
	{!! link_to('guru/'.$g->id,'Detail',['class'=>'btn btn-default btn-sm']) !!}
	{!! Form::open(array('method'=>'delete','url'=>'guru/'.$g->id))!!}
	{!!	Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])!!}
	{!!	Form::hidden('_delete','DELETE')!!}
	{!!	Form::close()!!}</td>
	</tr>
	<?php $no++; ?>
	@endforeach
</table>
{!! $guru->render() !!}

@stop