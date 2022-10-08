@extends('layout')

@section('content')
    <h3>List of deleted</h3>
    <a href="/category/" class="btn btn-info">List</a>
    <table class="table">
        <tr>
            <th>Title</th>
            <th>Slug</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Update</th>
        </tr>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->title}}</td>
                <td>{{$category->slug}}</td>
                <td>{{$category->created_at }}</td>
                <td>{{$category->updated_at }}</td>
                <td><a href="/category/{{ $category->id }}/restore">Restore</a></td>
            </tr>
        @endforeach
    </table>
@endsection
