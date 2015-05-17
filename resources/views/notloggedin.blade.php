@extends('master')
@section('main')

<div class="container">   
<div class="col-md-8 col-md-offset-2 form-content">
		<div class='text-center'>
    <p>
		{!!HTML::link('/login','Logi sisse',['class'=>'btn btn-default'])!!} või {!!HTML::link('/register','Registreeri kasutajaks',['class'=>'btn btn-default'])!!}
		<p>{!!HTML::link('/facebookauth','Logi sisse facebook kontoga',['class'=>'btn btn-default'])!!}</p> 
    </p> 
	</div>
	</div>	
</div>

@stop