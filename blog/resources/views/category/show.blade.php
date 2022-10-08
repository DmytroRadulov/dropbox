@extends('layout')

@section('form')
    <h1>{{ $category->title }}</h1>
    <ul>
        <li>
            Slug: {{ $category->slug }}
        </li>
        <li>
            Created: {{ $category->created_at }}
        </li>
        <li>
            Update: {{ $category->update_at }}
        </li>
    </ul>
@endsection