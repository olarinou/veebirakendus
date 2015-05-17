@extends('master')
<script src="js/addkandidaadid.js"></script>	 
@section('main')
    <div class="container">	
			<div class="col-md-8 col-md-offset-2 form-content">

			<form id="kandidaadid" onSubmit="return formValidation(this.form) " action="addkandidaadid" method="post">
				<div class="form-group">
			        <label for="nimi">Nimi:</label>
			        <input type="text" class="form-control" name="nimi" id="nimi" placeholder="Nimi" required>
			    </div>
			    <div class="form-group">
			        <label for="erakond">Erakond:</label>
			        <select class="form-control" name="erakond" id="erakond" required>
			        	<option>Merkuur</option>
    					<option>Veenus</option>
    					<option>Maa</option>
   						<option>Mars</option>
   						<option>Jupiter</option>
    					<option>Saturn</option>
    					<option>Uraan</option>
   						<option>Neptuun</option>
   						<option>Pluuto</option>
    				</select>
			    </div>
			    <div class="form-group">
			        <label for="piirkond">Piirkond:</label>
			        <select class="form-control" name="piirkond" id="piirkond" required>
			        <option>Harju maakond</option>
   						<option>Lääne maakond</option>
   						<option>Rapla maakond</option>
    					<option>Järva maakond</option>
    					<option>Jõgeva maakond</option>
   						<option>Pärnu maakond</option>
   						<option>Viljandi maakond</option>
    					<option>Tartu maakond</option>
    					<option>Valga maakond</option>
   						<option>Põlva maakond</option>
   						<option>Võru maakond</option>
    					<option>Saare maakond</option>
    					<option>Hiiu maakond</option>
  					</select>
			    </div>
				<div class='text-center'>
			    <button type="submit" class="btn btn-default">Lisa</button>
				</div>
			</form>	
			 </div>
	</div> 
@stop
