@extends('main.layouts.main')

@section('title', content: 'Create: Lab 1 & 2')
@section('content')
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="mb-3">
            <h2>Create new post</h2>

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
                placeholder="Post Title" value="{{ old('title') }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label ">Body</label>
            <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="4" required
                placeholder="What are you thinking right now?">{{ old('body') }}</textarea>
            @error('body')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="user-select" class="form-label @error('user_id') is-invalid @enderror">Poster: </label> <br />
            <select name="user_id" id="user-select">
                @foreach ($users as $user)
                    <option value={{ $user->id }}>
                        {{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
                <div class="invalid-feedback">{{ $message }} </div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Post</button>
    </form>
@endsection
