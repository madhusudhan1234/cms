@extends('layouts.backend')

@section('title',$page->exists ? 'Editing'.$page->name:'Create New Page');

@section('content')
    {!! Form::model($page,[
        'method'=> $page->exists ? 'put' : 'post',
        'route' => $page->exists ? ['backend.pages.update',$page->id] : ['backend.pages.store']
    ]) !!}

    <div class="form-group">
        {!! Form::label('title') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('uri','URI') !!}
        {!! Form::text('uri',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group row">
        <div class="col-lg-4">
            {!! Form::select('template',$templates,null,['class'=>'form-control']) !!}
        </div>
        <div class="col-lg-8">
            {!! Form::label('template') !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}

        <p class="help-block">
            This name is used to generate links to the page.
        </p>
    </div>
    <div class="form-group">
        {!! Form::label('content') !!}
        {!! Form::textarea('content',null,['class'=>'form-control']) !!}
    </div>

    {!! Form::submit($page->exists ? 'Save Page' : 'Create New Page',['class'=>'btn btn-primary']) !!}

    <script>
        new SimpleMDE().render();
    </script>
    {!! Form::close() !!}
@endsection