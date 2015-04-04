@extends('master') 
@section('main')
	<div class="container">	
		<div class="col-md-8 col-md-offset-2 form-content">
        <h3 class="heading">Otsing</h3>
        {!!Form::open(['url'=>'/otsing','class'=>'form form-horizontal','style'=>'margin-top:50px'])!!}
        <div class="form-group">
            {!! Form::label('nimi','Kandidaadi nimi:',['class'=>'col-sm-3 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('nimi',Input::old('nimi'),['class'=>'form-control']) !!}
            </div>
        </div>        
        <div class="text-center">
            {!!Form::submit('Otsi',['class'=>'btn btn-default'])!!}
        </div>
        {!!Form::close()!!}
    </div>
	</div>
@stop