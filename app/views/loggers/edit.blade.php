@extends('layouts/collectData')
@section('amps')
<div class='row clearfix'>
    <div class='col-sm-12'>
    {{ HTML::ul($errors->all()) }}
    {{Form::open(array('route'=>array('amps.update',$amp->id), 'method'=>'PUT'))}}
        <div class="col-sm-12">
            <h2><span class="glyphicon glyphicon-edit" style="margin: 5px"></span>Edit Amp</h2>
        </div>
        <div class="col-sm-4">
            <div class='form-group'>
                {{ Form::label('id', 'Id') }}
                {{ Form::text('id', $amp->id, array('class'=>'form-control', 'readonly')) }}
            </div>
            <div class='form-group'>
                {{Form::label('record_id', 'Record') }}
                {{Form::select('record_id',$records,$amp->record_id,array('class'=>'form-control', 'readonly'))}}
            </div>
            <div class='form-group'>
                {{ Form::label('amp', 'Amp') }}
                {{ Form::text('amp', $amp->amp, array('class'=>'form-control')) }}
            </div>
            <div class='form-group'>
                {{ Form::label('created_at', 'Created') }}
                {{ Form::text('created_at', $amp->created_at, array('class'=>'form-control', 'readonly')) }}
            </div>
            <div class='form-group'>
                {{ Form::label('updated_at', 'Updated') }}
                {{ Form::text('updated_at', $amp->updated_at, array('class'=>'form-control', 'readonly')) }}
            </div>
            <div class = "col-sm-12">
                <span class="col-sm-1"></span>
                <input name="returnURL" type="text" class="hidden" value="{{URL::previous()}}">
                <input type="button" value="Cancel"  onclick="window.location='{{URL::previous()}}'" class="col-sm-4 btn btn-default">
                <span class="col-sm-1"></span>
                {{ Form::submit('Submit', array('class'=>'col-sm-4 btn btn-primary')) }}
            </div>
        </div>
    {{ Form::close() }}
    </div>
</div>
@stop