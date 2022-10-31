@extends('layout')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <hr>
    <div>
        <h3>Reviews</h3>
        <hr>
        @foreach($post->reviews as $review)
            <ol class="table-info ">
                <li style="list-style-type: disc;">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">{{ $review->name }}</div>
                        {{ $review->description }}
                    </div>
                    <span class="badge bg-primary rounded-pill">{{ $review->created_at }}</span>
                </li>
            </ol>
        @endforeach
    </div>
    <div>
        <hr>
        <p>Add review</p>
        <form action="{{route('admin.posts.add.review',['id'=>$post->id]) }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Text</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                @if($errors->has('description'))
                    @foreach($errors->get('description') as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endisset
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>

    </div>
@endsection

