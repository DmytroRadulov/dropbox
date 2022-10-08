@extends('layout')

@section('form')
    <h1>{{ $tag->title }}</h1>
    <ul>
        <li>
            Slug: {{ $tag->slug }}
        </li>
        <li>
            created: {{ $tag->created_at }}
        </li>
        <li>
            update: {{ $tag->update_at }}
        </li>
    </ul>
@endsection