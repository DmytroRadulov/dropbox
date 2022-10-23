@extends('layout')

@section('content')
    <h1>User-posts</h1>
    <table class="table">
        <tr>
            <th>Tag title</th>
            <th>Post body</th>
            <th></th>
        </tr>
        @foreach($tag->posts as $post)
            <tr>
                <td>
                    {{ $tag->title }}
                </td>
                <td>{{$post->body }}</td>
{{--                <td><a href="{{route('tag.posts',['id'=>$tag->id]) }}">--}}
{{--                        tag--}}
{{--                    </a></td>--}}
            </tr>
        @endforeach
    </table>
@endsection

