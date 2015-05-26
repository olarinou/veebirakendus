@extends('master') 
@section('main')
		<div class="container">	
		<div class="col-xs-4 col-sm-7 col-md-12 col-lg-12">
		<h3 class="heading">Kandidaadid</h3>
			@include('kandidaadid_db')
		
		</div>
		</div>
@stop