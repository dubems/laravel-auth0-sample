@extends('layout')

@section('content')
    Welcome!
    <a href="{{URL::to('users')}}">See Users</a>
@stop