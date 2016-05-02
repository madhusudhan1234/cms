@extends('layouts.backend')

@section('title','Delete' .$user->name);

@section('content')
    {!! Form::open(['method'=>'delete','route'=>['backend.users.destroy',$user->id]]) !!}
        <div class="alert alert-danger">
            <div class="alert alert-danger">
                <strong>Warning</strong> You are about to delete a user. This action can not be undone. Are U sure you want to continue ?
            </div>
            {!! Form::submit('Yes, Delete This User',['class'=>'btn btn-danger']) !!}
            <a href="{{ route('backend.users.index') }}" class="btn btn-success"> <strong>No Get Me Out Of Here</strong></a>
        </div>
    {!! Form::close() !!}
@endsection