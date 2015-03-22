<!-- -->
@extends('master')
 
@section('main')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p>
                {!!HTML::link('/login','Logi sisse',['class'=>'btn btn-link'])!!} või {!!HTML::link('/register','Registreeri kasutajaks',['class'=>'btn btn-link'])!!}
            </p>
       </div>
   </div>
</div>

@stop