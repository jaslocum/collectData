@extends('layouts/collectData')
@section('volts')
<div class='row clearfix'>
    <div class='col-sm-12'>
    {{ HTML::ul($errors->all()) }}
    {{Form::open(array('route'=>array('volts.update',$volt->id), 'method'=>'PUT'))}}
        <div class="col-sm-12">
            <h2><span class="glyphicon glyphicon-edit" style="margin: 5px"></span>Edit Amp</h2>
        </div>
        <div class="col-sm-4">
            <div class='form-group'>
                {{ Form::label('id', 'Id') }}
                {{ Form::text('id', $volt->id, array('class'=>'form-control', 'readonly')) }}
            </div>
            <div class='form-group'>
                {{Form::label('record_id', 'Record') }}
                {{Form::select('record_id',$records,$volt->record_id,array('class'=>'form-control', 'readonly'))}}
            </div>
            <div class='form-group'>
                {{ Form::label('volt', 'Volt') }}
                {{ Form::text('volt', $volt->volt, array('class'=>'form-control')) }}
            </div>
            <div class='form-group'>
                {{ Form::label('created_at', 'Created') }}
                {{ Form::text('created_at', $volt->created_at, array('class'=>'form-control', 'readonly')) }}
            </div>
            <div class='form-group'>
                {{ Form::label('updated_at', 'Updated') }}
                {{ Form::text('updated_at', $volt->updated_at, array('class'=>'form-control', 'readonly')) }}
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