@extends('layout')

@section('content')
    <h1>Tag</h1>
    <a class="btn btn-success" href="{{route('admin.tags.create')}}">Create</a>
    <table class="table">
        <tr>
            <th>Title</th>
            <th>Slug</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        @foreach($tags as $tag)
            <tr>
                <td>{{ $tag->title }}</td>
                <td>{{ $tag->slug }}</td>
                <td>{{ $tag->category_id}}</td>
                <td>{{ $tag->created_at }}</td>
                <td><a href="/admin/tag/{{$tag->id}}/edit" class="btn btn-outline-primary">update</a></td>
                <td><a href="/admin/tag/{{$tag->id}}/delete" class="btn btn-outline-danger">delete</a></td>
            </tr>
        @endforeach
    </table>
    <ul>
        <li>
            <a href="{{ $tags->nextPageUrl() }}">Next page</a>
        </li>
        <li>
            <a href="{{ $tags->previousPageUrl() }}">Prev page</a>
        </li>
    </ul>
@endsection
