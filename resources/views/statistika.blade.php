@extends('master') 
<script src="js/stats.js"></script>
@section('main')
	<div class="container">
	<div class="col-md-8 col-md-offset-2 form-content">
    <h3 class="heading">Häälte jagunemine:</h3>
	<table>
		<tr>	
		{!! Form::label('n1','Ala:',['class'=>'col-sm-3 control-label']) !!}
		<div class="col-sm-8">
		<select id="ala">			
			<option value="Riik">Riik</option>
    		<option value="Harju">Harju</option>
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
		</div>
		</tr>
		<tr>
		<b> Partei: </b>		 
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
		<tr>
		<b> Lisa: </b>		
		<select id="lisa">
			<option value="kandidaat">Näita kandidaate</option>
			<option value="nokandidaat">Peida kandidaadid</option>    		
		</select>
		</tr>
		<tr>		
		{!!Form::submit('OK',['onClick'=> 'statsRetrival(22)','class'=>'btn btn-default'])!!}		
		</tr>
		</div>
		</table>		
		
	<br>
	<div id="result"><b></b></div>		
	</div>
	</div>
@stop
