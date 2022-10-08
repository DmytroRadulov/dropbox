@extends('layout')

@section('content')
    @isset($_SESSION['success'])
        <div class="alert alert-success" role="alert">
            {{ $_SESSION['success'] }}
        </div>
    @endisset
    @php
        unset($_SESSION['success']);
    @endphp
    <h1>Tag</h1>
    <a class="btn btn-success" href="/tag/create">Create</a>
    <a href="/tag/trash" class="btn btn-info">Trash</a>
    <table class="table">
        <tr>
            <th>Title</th>
            <th>Slug</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Update</th>
            <th>Delete</th>
            <th>Show</th>
            <th>Force Delete</th>
        </tr>
        @foreach($tags as $tag)
            <tr>
                <td>{{ $tag->title }}</td>
                <td>{{ $tag->slug }}</td>
                <td>{{ $tag->category_id}}</td>
                <td>{{ $tag->created_at }}</td>
                <td><a href="/tag/{{$tag->id}}/edit" class="btn btn-outline-primary">update</a></td>
                <td><a href="/tag/{{$tag->id}}/delete" class="btn btn-outline-danger">delete</a></td>
                <td><a href="/tag/{{$tag->id}}/show" class="btn btn-outline-info">show</a></td>
                <td><a href="/tag/{{ $tag->id }}/force-delete">Force Delete</a></td>
            </tr>
        @endforeach
    </table>
@endsection