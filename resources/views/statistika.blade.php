@extends('master') 
@section('main')
	<div class="container">
	@include('statistikastream') 
    <!--<div id="perf_div"></div>
   {!! $lava->render('PieChart', 'Info', 'perf_div') !!}-->
	</div>
@stop
