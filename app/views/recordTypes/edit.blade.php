@extends('layouts/collectData')
@section('recordTypes')
<div class='row clearfix'>
    <div class='col-sm-12'>
    {{HTML::ul($errors->all())}}
    {{Form::open(array('route'=>array('recordTypes.update',$recordType->id), 'method'=>'PUT'))}}
        <div class="col-sm-12">
            <h2><span class="glyphicon glyphicon-edit"></span>Edit Record Type</h2>
        </div>
        <div class="col-sm-4">
            <div class='form-group'>
                {{ Form::label('id', 'Id') }}
                {{ Form::text('id', $recordType->id, array('class'=>'form-control', 'readonly'=>'readonly')) }}
            </div>
            <div class='form-group'>
                {{Form::label('name', 'Name') }}
                {{Form::text('name',$recordType->name, array('class'=>'form-control'))}}
            </div>
            <div class='form-group'>
                {{ Form::label('description', 'Description') }}
                {{ Form::text('description', $recordType->description, array('class'=>'form-control')) }}
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