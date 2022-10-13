@extends('layout')

@section('content')
    <h1>Post</h1>
    <table class="table">
        <tr>
            <th>user name</th>
            <th>category title</th>
            <th>title</th>
            <th>body</th>
            <th>Created_at</th>
            <th>Updated_at</th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category->title}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td>{{$post->created_at }}</td>
                <td>{{$post->updated_at }}</td>
            </tr>
        @endforeach
    </table>
@endsection

