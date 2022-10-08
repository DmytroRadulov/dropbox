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
    <h1>Categories</h1>
    <a class="btn btn-success" href="/category/create">Create</a>
    <a href="/category/trash" class="btn btn-info">Trash</a>
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
        @foreach($categories as $category)
            <tr>
                <td>{{$category->title}}</td>
                <td>{{$category->slug}}</td>
                <td>{{$category->created_at }}</td>
                <td>{{$category->updated_at }}</td>
                <td><a href="/category/{{$category->id}}/edit"
                       class="btn btn-outline-primary">update</a></td>
                <td><a href="/category/{{$category->id}}/delete"
                       class="btn btn-outline-danger">delete</a></td>
                <td><a href="/category/{{$category->id}}/show"
                       class="btn btn-outline-info">Show</a></td>
                <td><a href="/category/{{ $category->id }}/force-delete">Force Delete</a></td>
            </tr>
        @endforeach
    </table>
@endsection
