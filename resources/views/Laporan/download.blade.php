@extends('template.master')
@section('content')

<b>Export berdasarkan kelas : </b>
{!! Form::open(array('url'=>'export2')) !!}
{!! Form::select('kelas',array(''=>'Semua Kelas','1'=>"$tampilkelas-1",'2'=>"$tampilkelas-2",'3'=>"$tampilkelas-3",'4'=>"$tampilkelas-4",'5'=>"$tampilkelas-5"),'') !!}
<br>
<br>
{!! Form::submit('Download file',['class'=>'btn btn-danger btn-sm']) !!}
{!! Form::close()!!}
@stop