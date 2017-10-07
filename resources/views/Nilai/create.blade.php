@extends('template.master')
@section('content')

{!! Html::ul($errors->all(),['class'=>'alert alert-danger','role'=>'alert']) !!}
{!! Form::open(array('url'=>'nilai'))!!}
<hr>
<table class="table table-bordered">
	<tr><td>NIS</td><td><select name="pelajar_id" class="form-control">@foreach($pelajar as $a)<option value={{ $a->id }}>{{ $a->NIS }}</option>@endforeach</select></td>
	<tr><td>Pelajaran</td><td>{!! Form::select('pelajaran',array('Matematika'=>'Matematika','IPA'=>'IPA','IPS'=>'IPS','Bahasa Inggris'=>'Bahasa Inggris','Bahasa Indonesia'=>'Bahasa Indonesia'),'',['class'=>'form-control']) !!}</td>
	<tr><td>Tipe Ujian</td><td>{!! Form::select('tipe_ujian',array('UTS'=>'UTS','UAS'=>'UAS'),'',['class'=>'form-control']) !!}</td>
	<tr><td>Nilai</td><td>{!! Form::text('nilai_ujian',null,['class'=>'form-control']) !!}</td></tr>
	<tr><td colspan="2"> {!! Form::submit('masukkan nilai',['class'=>'btn btn-danger btn-sm'])!!}</td></tr>
</table>
{!! Form::close() !!}
@stop