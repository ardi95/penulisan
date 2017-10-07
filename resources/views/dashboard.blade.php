@extends('template.awal')
@section('content')

<div style="text-align:center;">
	<h1>SELAMAT DATANG</h1>
	<h2>SMP 21 NEGERI BEKASI</h2>
</div>
<hr>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
   		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
   		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
    	<li data-target="#carousel-example-generic" data-slide-to="2"></li>
   	</ol>
    <div class="carousel-inner" role="listbox">
    	<div class="item active">
        	<div style="text-align:center;">
            	<img src="{{ asset('foto/contoh.jpg') }}" alt="First slide" width="1000" height="450">
           	</div>
       	</div>
       	<div class="item">
           	<div style="text-align:center;">
            	<img src="{{ asset('foto/background1.png') }}" alt="Second slide" width="1000" height="450">
           	</div>
       	</div>
       	<div class="item">
           	<div style="text-align:center;">
            	<img src="{{ asset('foto/background2.png') }}" alt="Third slide"width="1000" height="450">
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
       	<span class="sr-only">Next</span>
   	</a>
</div>
  




@stop