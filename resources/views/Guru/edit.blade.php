@extends('template.admin')
@section('content')

{!! Html::ul($errors->all(),['class'=>'alert alert-danger','role'=>'alert']) !!}
{!! Form::model($guru,array('url'=>'guru/'.$guru->id,'method'=>'patch'))!!}
<table class="table table-bordered">

	<tr><td>Nama Lengkap</td><td>{!! Form::text('name',null,['class'=>'form-control']) !!}</td></tr>
	<tr><td>Username</td><td>{!! Form::text('email',null,['class'=>'form-control']) !!}</td></tr>
	<tr><td>Password</td><td><input type="password" name="password" class="form-control"></td></tr>
	<tr><td>Confirm Password</td><td><input type="password" name="password_confirmation" class="form-control"></td></tr>
	<tr><td>NIP</td><td>{!! Form::text('NIP',null,['class'=>'form-control']) !!}</td></tr>
	<tr><td>Alamat</td><td>{!! Form::textarea('alamat',null,['class'=>'form-control']) !!}</td></tr>
	<tr><td>No. Telpon</td><td>{!! Form::text('telpon_guru',null,['class'=>'form-control']) !!}</td></tr>
	<tr><td>Email</td><td>{!! Form::text('status_email',null,['class'=>'form-control']) !!}</td></tr>
	<tr><td>Spesialisasi</td><td>{!! Form::select('nilai_pelajaran',array('Admin'=>'Admin','Matematika'=>'Matematika','IPA'=>'IPA','IPS'=>'IPS','Bahasa Inggris'=>'Bahasa Inggris','Bahasa Indonesia'=>'Bahasa Indonesia'),null,['class'=>'form-control']) !!}</td>
	<tr><td>Pengajar Kelas</td><td>{!! Form::select('ajar_kelas',array('7'=>'7','8'=>'8','9'=>'9','semua_kelas'=>'semua kelas'),null,['class'=>'form-control']) !!}</td></tr>
	
	<tr><td colspan="2">
		{!! Form::submit('simpan data',['class'=>'btn btn-danger btn-sm']) !!}
		{!! link_to('guru','Kembali',['class'=>'btn btn-primary']) !!}
	</td></tr>

</table>
{!! Form::close()!!}
@stop