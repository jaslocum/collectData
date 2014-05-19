@extends('layouts/collectData')
@section('records')
<div class='row clearfix'>
    <div class='col-sm-12'>
    {{ HTML::ul($errors->all()) }}
    {{Form::open(array('route'=>array('records.update',$record->id), 'method'=>'PUT'))}}
        <input name="returnURL" type="text" class="hidden" value="{{$returnURL}}">
        <div class="col-sm-12">
            <h2><span class="glyphicon glyphicon-edit"></span>Edit Record</h2>
        </div>
        <div class="col-sm-4">
            <div class='form-group'>
                {{ Form::label('id', 'Id') }}
                {{ Form::text('id', $record->id, array('class'=>'form-control', 'readonly'=>'readonly')) }}
            </div>
            <div class='form-group'>
                {{ Form::label('active', 'Active?') }}
                {{ Form::checkbox('active', $record->active, $record->active, array('onclick'=>"cbSet(this)")) }}
            </div>
            <div class='form-group'>
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', $record->name, array('class'=>'form-control')) }}
            </div>
            <div class='form-group'>
                {{ Form::label('description', 'Description') }}
                {{ Form::text('description', $record->description, array('class'=>'form-control')) }}
            </div>
            <div class='form-group'>
                {{ Form::label('command', 'Command') }}
                {{ Form::text('command', $record->command, array('class'=>'form-control')) }}
            </div>
            <div class='form-group'>
                {{ Form::label('multiplier', 'Multiplier') }}
                {{ Form::text('multiplier', $record->multiplier, array('class'=>'form-control')) }}
            </div>
        </div>
        <div class="col-sm-4">
            <div class='form-group'>
                {{Form::label('logger_id', 'Logger') }}
                {{Form::select('logger_id',$loggers,$record->logger_id,array('class'=>'form-control'))}}
            </div>
            <div class='form-group'>
                {{Form::label('record_type_id', 'Record') }}
                {{Form::select('record_type_id',$recordTypes,$record->record_type_id,array('class'=>'form-control'))}}
            </div>
            <div class='form-group'>
                {{Form::label('unit_id', 'Unit') }}
                {{Form::select('unit_id',$units,$record->unit_id,array('class'=>'form-control'))}}
            </div>
            <div class='form-group'>
                {{ Form::label('graph_y_lower', 'Graph Lower') }}
                {{ Form::text('graph_y_lower', $record->graph_y_lower, array('class'=>'form-control')) }}
            </div>
            <div class='form-group'>
                {{ Form::label('graph_y_upper', 'Graph Upper') }}
                {{ Form::text('graph_y_upper', $record->graph_y_upper, array('class'=>'form-control')) }}
            </div>
            <div class = "col-sm-12">
                {{ Form::submit('Submit', array('class'=>'col-md-3 btn btn-primary')) }}
                <div class="col-md-1"></div>
                <input type="button" value="Cancel"  onclick="window.location='{{$returnURL}}'" class="col-md-3 btn btn-default">
                <div class="col-md-1"></div>
                <input type="button" value="Delete"  onclick="deleteURI('{{$deleteURI}}','{{$returnURL}}')" class="col-md-3 btn btn-danger">
            </div>
        </div>
    {{ Form::close() }}
    </div>
</div>
@stop