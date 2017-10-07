@extends('template.admin')
@section('content')

{!! Html::ul($errors->all(),['class'=>'alert alert-danger','role'=>'alert']) !!}
{!! Form::model($pelajar,array('url'=>'pelajar/'.$pelajar->id,'method'=>'patch'))!!}
<table class="table table-bordered">

	<tr><td>Username</td><td>{!! Form::text('email',null,['class'=>'form-control']) !!}</td></tr>
	<tr><td>Password</td><td><input type="password" name="password" class="form-control"></td></tr>
	<tr><td>Confirm Password</td><td><input type="password" name="password_confirmation" class="form-control"></td></tr>
	<tr><td>NIS</td><td>{!! Form::text('NIS',null,['class'=>'form-control']) !!}</td></tr>
	<tr><td>Nama Lengkap</td><td>{!! Form::text('nama_lengkap',null,['class'=>'form-control']) !!}</td></tr>
	<tr><td>Kelas</td><td>{!! Form::select('kelas',array('7_1'=>'7_1','7_2'=>'7_2','7_3'=>'7_3','7_4'=>'7_4','7_5'=>'7_5','8_1'=>'8_1','8_2'=>'8_2','8_3'=>'8_3','8_4'=>'8_4','8_5'=>'8_5','9_1'=>'9_1','9_2'=>'9_2','9_3'=>'9_3','9_4'=>'9_4','9_5'=>'9_5'),null,['class'=>'form-control']) !!}</td></tr>
	<tr><td>Alamat</td><td>{!! Form::textarea('alamat',null,['class'=>'form-control']) !!}</td></tr>
	<tr><td>No. Telpon</td><td>{!! Form::text('telpon_pelajar',null,['class'=>'form-control']) !!}</td></tr>
	<tr><td>Email</td><td>{!! Form::email('status_email',null,['class'=>'form-control']) !!}</td></tr>
	<tr><td colspan="2">
		{!! Form::submit('simpan data',['class'=>'btn btn-danger btn-sm']) !!}
		{!! link_to('pelajar','Kembali',['class'=>'btn btn-primary']) !!}
	</td></tr>
</table>
{!! Form::close()!!}
@stop