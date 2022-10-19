@extends('layout')

@section('content')
    <h1>User-posts</h1>
    <table class="table">
        <tr>
            <th>User name</th>
            <th>Category</th>
            <th>Tags</th>
            <th>Post body</th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->user->name }}</td>
                <td>{{$post->category->title}}</td>
                <td>
                    @php
                        $tagsTitle = [];
                    @endphp
                    @foreach($post->tags as $tag)
                        @php
                            $tagsTitle[] = $tag->title;
                        @endphp
                    @endforeach
                    {{ implode(' | ', $tagsTitle) }}
                </td>
                <td>{{$post->body}}</td>
            </tr>
        @endforeach
    </table>
@endsection

