@extends('master') 
<script src="js/statsstream.js"></script>
@section('main')
	<div class="container">
		<select id="valik">
			<option value="Riik">Riigis</option>
    		<option value="Piirkond">Piirkondades</option>
    		<option value="Partei">Parteides</option>
   			<option value="Kandidaat">Kandidaatides</option>   						
		</select>
	<br>
	<p id="result"></p>
	<script>
	dataRetrival();
	</script>
	</div>
@stop
