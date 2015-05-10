@extends('master') 
<script src="js/statsstream.js"></script>
@section('main')
	<div class="container">
		<select name="valik">
			<option value="Riik">Riigis</option>
    		<option value="Piirkond">Piirkondades</option>
    		<option value="Partei">Parteides</option>
   			<option value="Kandidaat">Kandidaatides</option>   						
		</select>
	<br>
	<p id="result"></p>
	<script>
	if(typeof(EventSource) !== "undefined") {
		var source = new EventSource("/data/"+querySetting);
		source.onmessage = function(event) {
			document.getElementById("result").innerText = event.data;
		};
	}
	else {
		document.getElementById("result").innerText = "Sorry, your browser does not support server-sent events...";
	}
	</script>
	</div>
@stop
