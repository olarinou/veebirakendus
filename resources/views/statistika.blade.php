@extends('master') 
@section('main')
	<div class="container">	
	<p>Statistika</p>
    <div id="perf_div"></div>
    {!! $lava->render('LineChart', 'Info', 'perf_div') !!}
	</div>
@stop
