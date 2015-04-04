@extends('master')
@section('main')

<div class="container">   
    <p>
		{!!HTML::link('/login','Logi sisse',['class'=>'btn btn-default'])!!} või {!!HTML::link('/register','Registreeri kasutajaks',['class'=>'btn btn-default'])!!}
		<p>{!!HTML::link('/facebookauth','Logi sisse facebook kontoga',['class'=>'btn btn-default'])!!}</p> 
    </p>    
</div>

@stop