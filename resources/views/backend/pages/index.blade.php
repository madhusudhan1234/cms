@extends('layouts.backend')

@section('title','Pages')

@section('content')
    <a href="{{ route('backend.pages.create') }}" class="btn btn-primary"> Create New Page</a>
    <table class="table table-hover">
        <thead>
        <th>Title</th>
        <th>URI</th>
        <th>Template</th>
        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>
        </thead>
        <tbody>

        @if($pages->isEmpty())
            <tr colspan="5" align="center">There is no any pages </tr>
        @else
            @foreach($pages as $page)

                <tr>
                    <td>
                        {!! $page->linkToPaddedTitle(route('backend.pages.edit',$page->id)) !!}
                    </td>
                    <td><a href="{{ url($page->uri) }}"> {{ $page->pretty_uri  }}</a></td>
                    <td>{{ $page->template or 'None' }}</td>
                    <td>{{ $page->name or 'None'}}</td>
                    <td>{{ $page->name or 'None' }}</td>
                    <td>{{ $page->template or 'None' }}</td>
                    <td>
                        <a href="{{ route('backend.pages.edit',$page->id) }}">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('backend.pages.confirm',$page->id) }}">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection