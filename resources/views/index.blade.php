@extends('layout')

@section('content')
    @if (Auth::check())
    Welcome, {{ Auth::user()->name }}!
    @else
    Welcome!
    @endif
@stop