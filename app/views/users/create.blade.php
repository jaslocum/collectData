@extends('layouts/default')
@section('content')
    <h2>Create New User</h2>
    {{Form::open(['route'=>'users.store'])}}
        <div>
            {{Form::label('name', 'name:', ['style'=>'float:left;margin-left:5px'])}}
            {{Form::text('name','', ['style'=>'margin-left:10px'])}}
            {{$errors->first('name')}}
        </div>
        <div>
            {{Form::label('email', 'email:', ['style'=>'float:left;margin-left:5px'])}}
            {{Form::text('email','',['style'=>'margin-left:10px'])}}
            {{$errors->first('email')}}
        </div>
        <div>
            {{Form::submit('Create User')}}
        </div>
    {{Form::close()}}
@stop