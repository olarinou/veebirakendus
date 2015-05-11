@extends('master')
<script src="js/statsstream.js"></script>
@section('main')
		<div class="container">	
		<p id="result"></p>
			<script type='text/javascript'>
			dataRetrival();
			</script>
		</div>
@stop