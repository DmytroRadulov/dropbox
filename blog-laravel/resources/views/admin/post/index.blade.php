@extends('layout')

@section('content')
    <h1>Post</h1>
    <a href="{{route('admin.posts.create')}}" class="btn btn-success">Add post</a>
    <table class="table">
        <tr>
            <th>user name</th>
            <th>category title</th>
            <th>title</th>
            <th>body</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category->title}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td>{{$post->created_at }}</td>
                <td>{{$post->updated_at }}</td>
                <td><a href="/admin/post/{{$post->id}}/edit"
                       class="btn btn-outline-primary">update</a></td>
                <td><a href="/admin/post/{{$post->id}}/delete"
                       class="btn btn-outline-danger">delete</a></td>
            </tr>
        @endforeach
    </table>
    <ul>
        <li>
            <a href="{{ $posts->nextPageUrl() }}">Next page</a>
        </li>
        <li>
            <a href="{{ $posts->previousPageUrl() }}">Prev page</a>
        </li>
    </ul>
@endsection

