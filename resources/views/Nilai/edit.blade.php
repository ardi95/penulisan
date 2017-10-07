@extends('template.master')
@section('content')

{!! Html::ul($errors->all(),['class'=>'alert alert-danger','role'=>'alert']) !!}
{!! Form::model($nilai,array('url'=>'nilai/'.$nilai->id,'method'=>'patch'))!!}
<table class="table table-bordered">

	<tr><td>Pelajaran</td><td>{!! Form::select('pelajaran',array('Matematika'=>'Matematika','IPA'=>'IPA','IPS'=>'IPS','Bahasa Inggris'=>'Bahasa Inggris','Bahasa Indonesia'=>'Bahasa Indonesia'),'',['class'=>'form-control']) !!}</td>
	<tr><td>Tipe Ujian</td><td>{!! Form::select('tipe_ujian',array('UTS'=>'UTS','UAS'=>'UAS'),'',['class'=>'form-control']) !!}</td>
	<tr><td>Nilai</td><td>{!! Form::text('nilai_ujian',null,['class'=>'form-control']) !!}</td></tr>
	<tr><td colspan="2">
		{!! Form::submit('simpan data',['class'=>'btn btn-danger btn-sm']) !!}
		{!! link_to('nilai','Kembali',['class'=>'btn btn-primary']) !!}
		</td></tr>
</table>
{!! Form::close()!!}
@stop