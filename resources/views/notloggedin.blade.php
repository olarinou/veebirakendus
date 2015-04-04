@extends('master')
@section('main')

<div class="container">   
    <p>
		{!!HTML::link('/login','Logi sisse',['class'=>'btn btn-link'])!!} või {!!HTML::link('/register','Registreeri kasutajaks',['class'=>'btn btn-link'])!!}
		<p>{!!HTML::link('/facebookauth','Logi sisse facebook kontoga',['class'=>'btn btn-link'])!!}</p> 
    </p>    
</div>

@stop