@extends('layout')

@section('form')
    <h1>{{ $post->title }}</h1>
    <ul>
        <li>
            Slug: {{ $post->slug }}
        </li>
        <li>
            Body: {{ $post->body }}
        </li>
        <li>
            created: {{ $post->created_at }}
        </li>
        <li>
            update: {{ $post->update_at }}
        </li>
    </ul>
@endsection