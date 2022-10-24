@extends('layout')

@section('form')
    <h1></h1>
    {{ $isCreate }}
    <form action="@if($isCreate) {{route('admin.categories.store')}} @else {{route('admin.categories.update')}} @endif"
          method="post">
        @csrf
        @if(!$isCreate)
            <input type="hidden" id="id" name="id" value="{{ $category->id }}">
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">Title:</label>
            <input type="text" id="title" name="title"
                   value="{{$category->title && !$errors->has('title') ? $category->title : old('title')}}">
            @if($errors->has('title'))
                @foreach($errors->get('title') as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Slug:</label>
            <input type="text" id="slug" name="slug"
                   value="{{$category->slug && !$errors->has('slug') ? $category->slug : old('slug')}}">
            @if($errors->has('slug'))
                @foreach($errors->get('slug') as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endisset
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
