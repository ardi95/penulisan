@extends('template.master')
@section('content')
{!! Form::open(array('url'=>'import2','files'=>'true'))!!}
{!! Form::file('data',null,['class'=>'form-control']) !!}
{!! Form::submit('simpan data',['class'=>'btn btn-danger btn-sm']) !!}
{!! Form::close()!!}
@stop