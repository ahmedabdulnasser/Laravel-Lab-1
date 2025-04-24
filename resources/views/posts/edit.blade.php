@extends('main.layouts.main')

@section('title', content: 'Create: Lab 1 & 2')
@section('content')
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <h2>Editing post: {{ "#$post->id" }}</h2>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>



        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title', $post->title) }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label ">Body</label>
            <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="4"
                required>{{ old('body', $post->body) }}</textarea>
            @error('body')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            @error('user_id')
                <div class="invalid-feedback">{{ $message }} </div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Apply Edits</button>
    </form>
@endsection
