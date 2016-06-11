@extends('layouts.backend')

@section('title','Dashboard')


@section('content')
    <div class="row">
        <div class="col-md-6">
            <ul class="list-group">
                @foreach($posts as $post)
                    <li class="list-group-item">
                        <h4>
                            <a href="">{{ $post->title }}</a>
                            <a href="{{ route('backend.posts.edit',$post->id) }}" class="pull-right">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                        </h4>
                        {!! $post->excerpt !!}
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6">
            <ul class="list-group">
                @foreach($users as $user)
                    <li class="list-group-item">
                        <h4>
                            <a href="">{{ $user->name }}</a>
                        </h4>
                        Last Login at {!! $user->last_login_at->diffForHumans() !!}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
