@extends('template.admin')
@section('content')

<div id="tengah">

<br>
{!! Html::ul($errors->all(),['class'=>'alert alert-danger','role'=>'alert']) !!}
{!! Form::open(array('url'=>'postregadmin')) !!}
    {!! csrf_field() !!}
<table class="table table-bordered">
<tr><td>Nama Lengkap</td><td><input type="text" name="name" value="{{ old('name') }}" class="form-control"></td></tr>
<tr><td>Username</td><td><input type="text" name="email" value="{{ old('email') }}" class="form-control"></td></tr>
<tr><td>Password</td><td><input type="password" name="password" class="form-control"></td></tr>
<tr><td>Confirm Password</td><td><input type="password" name="password_confirmation" class="form-control"></td></tr>
<tr><td>NIP</td><td><input type="text" name="NIP" value="{{ old('NIP') }}" class="form-control"></td></tr>
<tr><td>Alamat</td><td><textarea name="alamat" value="{{ old('alamat') }}" class="form-control"></textarea></td></tr>
<tr><td>No. Telpon</td><td><input type="text" name="telpon_guru" value="{{ old('telpon_guru') }}" class="form-control"></td></tr>
<tr><td>Email</td><td><input type="email" name="status_email" value="{{ old('status_email') }}" class="form-control"></td></tr>
<tr><td>Spesialisasi</td><td>{!! Form::select('nilai_pelajaran',array('Admin'=>'Admin','Matematika'=>'Matematika','IPA'=>'IPA','IPS'=>'IPS','Bahasa Inggris'=>'Bahasa Inggris','Bahasa Indonesia'=>'Bahasa Indonesia'),'',['class'=>'form-control']) !!}</td>
<tr><td>Pengajar Kelas</td><td>{!! Form::select('ajar_kelas',array('7'=>'7','8'=>'8','9'=>'9','semua_kelas'=>'semua kelas'),'',['class'=>'form-control']) !!}</td></tr>
<tr><td colspan="2">
		{!! Form::submit('simpan data',['class'=>'btn btn-danger btn-sm']) !!}
		{!! link_to('pelajar','Kembali',['class'=>'btn btn-primary']) !!}
</td></tr>
</table>
</form>
</div>
@stop