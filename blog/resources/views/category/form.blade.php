@extends('layout')

@section('form')
    <h1></h1>
    {{ $isCreate }}
    <form action="@if($isCreate) /category/store @else /category/update @endif" method="post">
        <div class="mb-3">
            @if(!$isCreate)
                <input type="hidden" id="id" name="id" value="{{ $category->id }}">
            @endif
            <label for="name" class="form-label">Title:</label>
            <input type="text" id="title" name="title"
                   value="{{ $_SESSION['data']['title'] ?? $category->title ?? ''}}">

            @isset($_SESSION['errors']['title'])
                @foreach($_SESSION['errors']['title'] as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            @if(!$isCreate)
                <input type="hidden" id="id" name="id" value="{{ $category->id }}">
            @endif
            <label for="name" class="form-label">Slug:</label>
            <input type="text" id="slug" name="slug"
                   value="{{ $_SESSION['data']['slug'] ?? $category->slug ?? ''}}">
            @isset($_SESSION['errors']['slug'])
                @foreach($_SESSION['errors']['slug'] as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endisset
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    @php
        unset($_SESSION['errors']);
        unset($_SESSION['data']);
    @endphp
@endsection