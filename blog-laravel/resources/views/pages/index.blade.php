@extends('layout')

@section('content')
    <h1>Pages</h1>
    <table class="table">
        <tr>
            <th>id</th>
            <th>title</th>
            <th>description</th>
            <th>action</th>
        </tr>
        @foreach($pages as $page)
            <tr>
                <td>{{ $page->id }}</td>
                <td>{{ $page->title }}</td>
                <td>{{ $page->description }}</td>
                <td><a href="{{route('page.show',['id'=>$page->id])}}"
                       class="btn btn-outline-primary">More...</a></td>
            </tr>
        @endforeach
    </table>
@endsection

