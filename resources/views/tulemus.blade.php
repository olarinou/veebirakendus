@extends('master')
<script src="js/statsstream.js"></script>
@section('main')
		<div class="container">	
		<p id="result"></p>
			<script>
			dataRetrival();
			</script>
		</div>
@stop