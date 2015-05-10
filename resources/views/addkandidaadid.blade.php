@extends('master')
<script src="js/addkandidaadid.js"></script>	 
@section('main')
    <div class="container">	
			<form id="kandidaadid" onSubmit="return formValidation(this.form) " action="addkandidaadid" method="post">
				<div class="form-group">
			        <label for="nimi">Nimi:</label>
			        <input type="text" class="form-control" name="nimi" id="nimi" placeholder="Nimi" required>
			    </div>
			    <div class="form-group">
			        <label for="erakond">Erakond:</label>
			        <input type="text" class="form-control" name="erakond" id="erakond" placeholder="Erakond" required>
			    </div>
			    <div class="form-group">
			        <label for="piirkond">Piirkond:</label>
			        <select class="form-control" name="piirkond" id="piirkond" required>
			        	<option>Harjumaa</option>
    					<option>Tartumaa</option>
    					<option>Ida-Virumaa</option>
   						<option>Läänemaa</option>
  					</select>
			    </div>
			    <button type="submit" class="btn btn-default">Lisa</button>
			</form>	
	</div> 
@stop
