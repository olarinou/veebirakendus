@extends('master') 
@section('main')
	<div class="container">	
	<p>Statistika</p>
    <div id="perf_div"></div>
    {!! $lava->render('PieChart', 'Info', 'perf_div') !!}
	</div>
@stop
