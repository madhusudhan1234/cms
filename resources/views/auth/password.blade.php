@extends('layouts.auth')

@section('title','Forget Password')

@section('heading','Please Provide your email to reset your password')

@section('content')
    {!! Form::open() !!}

    <div class="form-group">
        {!! Form::label('email') !!}
        {!! Form::text('email',null,['class'=>'form-control']) !!}
    </div>

    {!! Form::submit('Send Password Reset Link',['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection