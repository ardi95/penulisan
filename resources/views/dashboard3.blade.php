@extends($template)
@section('content')
<div style="text-align:center;">
<h1>SELAMAT DATANG</h1>
<h2>SMP 21 NEGERI BEKASI</h2>
</div>
<hr>
<div class="col-sm-6">
<table class="table table-bordered">
  <tr><th colspan='2' style="text-align:center;">Biodata User</th></tr>
  <tr><td width="120">Nama</td><td>{{ $pelajar->nama_lengkap }}</td></tr>
  <tr><td>NIS</td><td>{{ $pelajar->NIS }}</td></tr>
  <tr><td>Kelas</td><td>{{ $pelajar->kelas }}</td></tr>
</table>


@stop