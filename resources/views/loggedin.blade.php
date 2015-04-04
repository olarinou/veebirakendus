@extends('master')
@section('main')
 
<div class="container">
    <p>Sisse loginud: <?php echo $username; ?>
			{!!HTML::link('/logout','Logi välja?',['class'=>'btn btn-link'])!!}
    </p>    
</div>

@stop
