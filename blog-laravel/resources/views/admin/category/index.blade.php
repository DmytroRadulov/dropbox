@extends('layout')

@section('content')
    <h1>Categories</h1>
    <a class="btn btn-success" href="{{route('admin.categories.create')}}">Create</a>
    <table class="table">
        <tr>
            <th>Title</th>
            <th>Slug</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->title}}</td>
                <td>{{$category->slug}}</td>
                <td>{{$category->created_at }}</td>
                <td>{{$category->updated_at }}</td>
                <td><a href="/admin/category/{{$category->id}}/edit"
                       class="btn btn-outline-primary">update</a></td>
                <td><a href="/admin/category/{{$category->id}}/delete"
                       class="btn btn-outline-danger">delete</a></td>
            </tr>
        @endforeach
    </table>
    <ul>
        <li>
            <a href="{{ $categories->nextPageUrl() }}">Next page</a>
        </li>
        <li>
            <a href="{{ $categories->previousPageUrl() }}">Prev page</a>
        </li>
    </ul>
@endsection
