@extends('layouts/default')
@section('content')
    <h2>All Users</h2>
    @foreach ($users as $user)
    <li>{{link_to("/users/$user->name",$user->name)}}</li>
    @endforeach
@stop
