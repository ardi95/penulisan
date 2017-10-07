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
  <tr><td width="120">Nama</td><td>{{ Auth::user()->name }}</td></tr>
  <tr><td>Spesialisasi</td><td>{{ Auth::user()->nilai_pelajaran }}</td></tr>
  <tr><td>Menangani Kelas</td><td>{{ Auth::user()->ajar_kelas }}</td></tr>
</table>

@stop