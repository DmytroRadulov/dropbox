@extends('layout')

@section('content')
    <h1>User-posts</h1>
    <table class="table">
        <tr>
            <th>User name</th>
            <th>Post</th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->user->name}}</td>
                <td>{{$post->body }}</td>
            </tr>
        @endforeach
    </table>
@endsection

