@extends('master') 
<script src="js/addkandidaadid.js"></script>
@section('main')
    	<div class="container">	
			<form id="kandidaadid" onSubmit="return formValidation(this.form) " action="addtokandidaadid.php" method="post">
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
			        <input type="text" class="form-control" name="piirkond" id="piirkond" placeholder="Piirkond" required>
			    </div>
			    <button type="submit" class="btn btn-default">Lisa</button>
			</form>	
		</div>
@stop
