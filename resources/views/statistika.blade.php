@extends('master') 
<script src="js/statsstream.js"></script>
@section('main')
	<div class="container">
		<select name="valik" onchange="setQuery(this.value)">
			<option value="Riik">Riigis</option>
    		<option value="Piirkond">Piirkondades</option>
    		<option value="Partei">Parteides</option>
   			<option value="Kandidaat">Kandidaatides</option>   						
		</select>
	<br>
	<p id="result" onLoad="dataRetrival(valik)"></p>
	</div>
@stop
