@extends('layout')

@section('form')
    <h3>{{ $isCreate }}</h3>
    <form action="@if($isCreate) {{route('admin.posts.store')}} @else {{route('admin.posts.update')}} @endif"
          method="post">
        @csrf
        @if(!$isCreate)
            <input type="hidden" id="id" name="id" value="{{ $post->id }}">
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">Title:</label>
            <label for="title"></label><input type="text" id="title" name="title"
                                              value="{{ ($post->title && !$errors->has('title') ? $post->title : old('title')) }}">
            @if($errors->has('title'))
                @foreach($errors->get('title') as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body:</label>
            <input type="text" id="body" name="body"
                   value="{{$post->body && !$errors->has('body') ? $post->body : old('body')}}">
            @if($errors->has('body'))
                @foreach($errors->get('body') as $error)
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
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tag:</label>
            <select name="tags[]" id="tags" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id ?? old('body')}}">{{ $tag->title }} ({{ $tag->slug }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">User:</label>
            <label for="user_id"></label><select name="user_id" id="user_id">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
