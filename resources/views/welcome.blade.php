@extends('layouts.backend')

@section('title','Welcome')


@section('content')
    Hello World
    <a href="{{ URL::to('auth/login') }}">Login</a>
@endsection
