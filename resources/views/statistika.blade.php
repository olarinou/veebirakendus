@extends('master') 
@section('main')
	<div class="container">
	<p id="result"></p>
	@section('scripts')	
	{{ HTML::script('js/statsstream.js') }}
	@stop
	</div>
@stop
