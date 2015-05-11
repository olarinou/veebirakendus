@extends('master') 
<script src="js/statsstream.js"></script>
@section('main')
	<div class="container">
	Häälte jagunemine:
		<table style="width:100%">		
		<tr><th>Ala</th>
		<select id="ala">			
			<option value="Riik">Riik</option>
    		<option value="Harju">Harju</option>
    		<option value="Lääne-Viru">Lääne-Viru</option>
   			<option value="Ida-Viru">Ida-Viru</option> 
			<option value="Lääne">Lääne</option>
			<option value="Rapla">Rapla</option>
			<option value="Järva">Järva</option> 
			<option value="Jõgeva">Jõgeva</option>
			<option value="Pärnu">Pärnu</option> 
			<option value="Viljandi">Viljandi</option> 	
			<option value="Tartu">Tartu</option>
			<option value="Valga">Valga</option> 
			<option value="Põlva">Põlva</option> 
			<option value="Võru">Võru</option>
			<option value="Saare">Saare</option> 
			<option value="Hiiu">Hiiu</option> 
		</select>
		</tr>
		<tr><th>Partei</th> 
		<select id="partei">
			<option value="Kõik">Kõik</option>
			<option value="Merkuur">Merkuur</option>
    		<option value="Veenus">Veenus</option>
    		<option value="Maa">Maa</option>
   			<option value="Mars">Mars</option>
			<option value="Jupiter">Jupiter</option>
    		<option value="Saturn">Saturn</option>
   			<option value="Uraan">Uraan</option>
			<option value="Neptuun">Neptuun</option>
    		<option value="Pluto">Pluto</option>
		</select>
		</tr>
		<tr><th>Lisa</th>
		<select id="lisa">
			<option value="kandidaat">Näita kandidaate</option>
			<option value="nokandidaat">Peida kandidaadid</option>    		
		</select>
		</tr>
		<tr>
		<button onclick="statsRetrival()">OK</button>
		</tr>
		</table>		
		
	<br>
	<p id="result"></p>			
	</div>
@stop
