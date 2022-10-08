@extends('layout')

@section('content')
    <h3>List of deleted</h3>
    <a href="/post/" class="btn btn-info">List</a>
    <table class="table">
        <tr>
            <th>Title</th>
            <th>Slug</th>
            <th>Body</th>
            <th>Category</th>
            <th>Tag</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Restore</th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->slug}}</td>
                <td>{{$post->body}}</td>
                <td>{{$post->category->title }}</td>
                <td>{{$post->tags->pluck('title')->join(', ') }}</td>
                <td>{{$post->created_at }}</td>
                <td>{{$post->updated_at }}</td>
                <td><a href="/post/{{ $post->id }}/restore">Restore</a></td>
            </tr>
        @endforeach
    </table>
@endsection
