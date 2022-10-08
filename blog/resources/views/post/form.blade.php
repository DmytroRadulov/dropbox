@extends('layout')

@section('form')
    <h3>{{ $isCreate }}</h3>
    <form action="@if($isCreate) /post/store @else /post/update @endif" method="post">
        <div class="mb-3">
            @if(!$isCreate)
                <input type="hidden" id="id" name="id" value="{{ $post->id }}">
            @endif
            <label for="name" class="form-label">Title:</label>
            <input type="text" id="title" name="title"
                   value="{{ $_SESSION['data']['title'] ?? $post->title ?? ''}}">
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
                <input type="hidden" id="id" name="id" value="{{ $post->id }}">
            @endif
            <label for="name" class="form-label">Slug:</label>
            <input type="text" id="slug" name="slug"
                   value="{{ $_SESSION['data']['slug'] ?? $post->slug ?? ''}}">
            @isset($_SESSION['errors']['slug'])
                @foreach($_SESSION['errors']['slug'] as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            @if(!$isCreate)
                <input type="hidden" id="id" name="id" value="{{ $post->id }}">
            @endif
            <label for="name" class="form-label">Body:</label>
            <input type="text" id="body" name="body"
                   value="{{ $_SESSION['data']['body'] ?? $post->body ?? ''}}">
            @isset($_SESSION['errors']['body'])
                @foreach($_SESSION['errors']['body'] as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category:</label>
            <select name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title}} ({{ $category->slug }})</option>
                @endforeach
            </select>
            @isset($_SESSION['errors']['category_id'])
                @foreach($_SESSION['errors']['category_id'] as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tag:</label>
            <select name="tags[]" id="tags" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->title }} ({{ $tag->slug }})</option>
                @endforeach
            </select>
            @isset($_SESSION['errors']['tags'])
                @foreach($_SESSION['errors']['tags'] as $error)
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