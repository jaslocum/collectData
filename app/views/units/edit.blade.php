@extends('layouts/collectData')
@section('units')
<div class='row clearfix'>
    <div class='col-sm-12'>
    {{ HTML::ul($errors->all()) }}
    {{Form::open(array('route'=>array('units.update',$unit->id), 'method'=>'PUT'))}}
        <div class="col-sm-12">
            <h2><span class="glyphicon glyphicon-edit" style="margin: 5px"></span>Edit Unit</h2>
        </div>
        <div class="col-sm-4">
            <div class='form-group'>
                {{ Form::label('id', 'Id') }}
                {{ Form::text('id', $unit->id, array('class'=>'form-control', 'readonly')) }}
            </div>
            <div class='form-group'>
                {{Form::label('record_id', 'Record') }}
                {{Form::select('record_id',$records,$unit->record_id,array('class'=>'form-control', 'readonly'))}}
            </div>
            <div class='form-group'>
                {{ Form::label('unit', 'Unit') }}
                {{ Form::text('unit', $unit->unit, array('class'=>'form-control')) }}
            </div>
            <div class='form-group'>
                {{ Form::label('created_at', 'Created') }}
                {{ Form::text('created_at', $unit->created_at, array('class'=>'form-control', 'readonly')) }}
            </div>
            <div class='form-group'>
                {{ Form::label('updated_at', 'Updated') }}
                {{ Form::text('updated_at', $unit->updated_at, array('class'=>'form-control', 'readonly')) }}
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