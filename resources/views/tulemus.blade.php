@extends('master')
<script src="js/statsstream.js"></script>
@section('main')
		<div class="container">	
		<div class="col-md-8 col-md-offset-2 form-content">
		<h3 class="heading">Tulemused reaalajas</h3>
		<p id="result"></p>
			<script type='text/javascript'>
			dataRetrival();
			</script>
		</div>
		</div>
@stop