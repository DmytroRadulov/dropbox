@extends('layout')

@section('content')
    <h3>List of deleted</h3>
    <a href="/tag/" class="btn btn-info">List</a>
    <table class="table">
        <tr>
            <th>Title</th>
            <th>Slug</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Update</th>
        </tr>
        @foreach($tags as $tag)
            <tr>
                <td>{{$tag->title}}</td>
                <td>{{$tag->slug}}</td>
                <td>{{$tag->created_at }}</td>
                <td>{{$tag->updated_at }}</td>
                <td><a href="/tag/{{ $tag->id }}/restore">Restore</a></td>
            </tr>
        @endforeach
    </table>
@endsection
