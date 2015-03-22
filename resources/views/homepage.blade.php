<!-- -->
@extends('master')
 
@section('main')
 
<div class="container">
    <div class="row">
         <div class="col-md-12">
             <p>Sisse loginud: <?php echo $username; ?>
			{!!HTML::link('/logout','Logi välja?',['class'=>'btn btn-link'])!!}
             </p>
         </div>
    </div>
</div>

@stop
