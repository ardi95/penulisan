@extends('template.guest')
@section('content')

{!! Form::open(array('url'=>'search')) !!}
{!! Form::text('keyword','',['class'=>'form-control','placeholder'=>'masukan NIS']) !!}
<br>
<p><b>Lihat Berdasarkan:</b></p>
{!! Form::select('keyworda',array('NIS'=>'NIS','nama_lengkap'=>'Nama','kelas'=>'Kelas'),'',['class'=>'form-control']) !!}
{!! Form::submit('Cari!',['class'=>'btn btn-danger btn-sm']) !!}
{!! Form::close() !!}
<hr>
<table class="table table-bordered">
	<tr><th>NIS</th><th>Nama</th><th>Kelas</th><th>option</th></tr>
	@foreach($awal as $p)
	<tr>
	<td align="center"><b>{{ $p->NIS }}</b></td>
	<td><b>{{ $p->nama_lengkap }}</b></td>
	<td><b>{{ $p->kelas }}</b></td>
	<td>
	{!! link_to('awal/'.$p->id,'Detail',['class'=>'btn btn-default btn-sm']) !!}
	</td>
	</tr>
	@endforeach
</table>
{!! $awal->render() !!}

@stop