@extends('layouts.backend')

@section('title','Blogs')

@section('content')
    <a href="{{ route('backend.posts.create') }}" class="btn btn-primary"> Create New Post</a>
    <table class="table table-hover">
        <thead>
            <th>Title</th>
            <th>Slug</th>
            <th>Auther </th>
            <th>Published at</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>

        <tbody>

        @if($posts->isEmpty())

            <tr colspan="5" align="center">There is no any Posts </tr>

        @else

            @foreach($posts as $post)
                <tr class="{{ $post->published_heighlight }}">
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->auther_id }}</td>
                    <td>{{ $post->published_date }}</td>
                    <td>
                        <a href="{{ route('backend.posts.edit',$post->id) }}">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('backend.posts.confirm',$post->id) }}">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    </td>
                </tr>
            @endforeach

        @endif

        </tbody>
    </table>
@endsection