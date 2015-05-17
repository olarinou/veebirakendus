@extends('master')
@section('main')
 
<div class="container">
	<div class="col-md-8 col-md-offset-2 form-content">
	<h3 class="heading">Kasutajainfo</h3>
		<div class='text-center'>
    <p>Sisse loginud: <?php echo $username; ?>
			{!!HTML::link('/logout','Logi välja?',['class'=>'btn btn-link'])!!}
    </p>   
	</div>
	</div>	
</div>

@stop
