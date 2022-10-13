@extends('layout')

@section('content')
    <h1>User</h1>
    <table class="table">
        <tr>
            <th>user name</th>
            <th>category title</th>
            <th>title</th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->user->name }}</td>
                <td>{{$post->category->title}}</td>
                <td>{{$post->body}}</td>
            </tr>
        @endforeach
    </table>
@endsection

