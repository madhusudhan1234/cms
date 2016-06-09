@extends('layouts.backend')

@section('title','Delete' .$post->title);

@section('content')
    {!! Form::open(['method'=>'delete','route'=>['backend.posts.destroy',$post->id]]) !!}
    <div class="alert alert-danger">
        <div class="alert alert-danger">
            <strong>Warning</strong> You are about to delete a Post. This action can not be undone. Are U sure you want to continue ?
        </div>
        {!! Form::submit('Yes, Delete This Page',['class'=>'btn btn-danger']) !!}
        <a href="{{ route('backend.posts.index') }}" class="btn btn-success"> <strong>No Get Me Out Of Here</strong></a>
    </div>
    {!! Form::close() !!}
@endsection