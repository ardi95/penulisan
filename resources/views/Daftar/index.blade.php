@extends('template.admin')
@section('content')

{!! Html::ul($errors->all(),['class'=>'alert alert-danger','role'=>'alert']) !!}
{!! Form::open(array('url'=>'Da'))!!}
<table class="table table-bordered">
	<tr><td>Password</td><td>{!! Form::text('password',null,['class'=>'form-control']) !!}</td></tr>
	<tr><td colspan="2">
		{!! Form::submit('simpan data',['class'=>'btn btn-danger btn-sm']) !!}
		{!! link_to('pelajar','Kembali',['class'=>'btn btn-primary']) !!}
		</td></tr>
</table>
{!! Form::close()!!}
@stop