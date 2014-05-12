@extends('layouts/default')
@section('content')
    <h2>One User</h2>
    <div>
        {{link_to("/users",$user->name)}} - {{$user->email}}
    </div>
@stop