@section('script')
{{ HTML::script('js/addkandidaadid.js')}}
@stop

@extends('master') 
@section('main')
    <div class="col-md-8 col-md-offset-2 form-content">
        <h3 class="heading">Kandidaadi lisamine</h3>        
        {!!Form::open(['url'=>'/addkandidaadid','onsubmit'=>'formValidation();return;','class'=>'form form-horizontal','style'=>'margin-top:50px'])!!}
        <div class="form-group">
            {!! Form::label('nimi','Nimi:',['class'=>'col-sm-3 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('nimi',Input::old('nimi'),['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('erakond','Erakond:',['class'=>'col-sm-3 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('erakond',Input::old('erakond'),['class'=>'form-control']) !!}
            </div>
        </div>
		<div class="form-group">
            {!! Form::label('piirkond','Piirkond:',['class'=>'col-sm-3 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('piirkond',Input::old('piirkond'),['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="text-center">
            {!!Form::submit('Lisa',['class'=>'btn btn-default'])!!}
        </div>
        {!!Form::close()!!}
    </div> 
@stop
