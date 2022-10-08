@extends('layout')

@section('content')
    @isset($_SESSION['success'])
        <div class="alert alert-success" role="alert">
            {{ $_SESSION['success'] }}
        </div>
    @endisset
    @php
        unset($_SESSION['success']);
    @endphp
    <h1>Post</h1>
    <a class="btn btn-success" href="/post/create">Create</a>
    <a href="/post/trash" class="btn btn-info">Trash</a>
    <table class="table">
        <tr>
            <th>Title</th>
            <th>Slug</th>
            <th>Body</th>
            <th>Category</th>
            <th>Tag</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Update</th>
            <th>Delete</th>
            <th>Show</th>
            <th>Force Delete</th>
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
                <td><a href="/post/{{$post->id}}/edit"
                       class="btn btn-outline-primary">update</a></td>
                <td><a href="/post/{{$post->id}}/delete"
                       class="btn btn-outline-danger">delete</a></td>
                <td><a href="/post/{{$post->id}}/show"
                       class="btn btn-outline-info">Show</a></td>
                <td><a href="/post/{{ $post->id }}/force-delete">Force Delete</a></td>
            </tr>
        @endforeach
    </table>
@endsection

