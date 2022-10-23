@extends('layout')

@section('form')
    <h3>{{ $isCreate }}</h3>
    <form action="@if($isCreate) {{route('admin.tags.store')}} @else {{route('admin.tags.update')}} @endif"
          method="post">
        @csrf
        @if(!$isCreate)
            <input type="hidden" id="id" name="id" value="{{ $tag->id }}">
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">Title:</label>
            <input type="text" id="title" name="title"
                   value="{{$tag->title && !$errors->has('title') ? $tag->title : old('title')}}">
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
                   value="{{$tag->slug && !$errors->has('slug') ? $tag->slug : old('slug')}}">
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


