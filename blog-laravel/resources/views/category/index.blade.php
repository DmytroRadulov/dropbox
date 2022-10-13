@extends('layout')

@section('content')
    <h1>Category</h1>
    <table class="table">
        <tr>
            <th>Category title</th>
            <th>Post</th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->category->title}}</td>
                <td>{{$post->body }}</td>
            </tr>
        @endforeach
    </table>
@endsection

