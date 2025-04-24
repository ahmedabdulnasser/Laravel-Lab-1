@extends('main.layouts.main')

@section('title', 'Lab 1 & 2')
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <p>My Post Count: {{ $userNoPosts }}</p>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
        @foreach ($posts as $post)
            @if (!$post->deleted_at)
                <div class="col">

                    <div class="card text-dark bg-light mb-3" style="max-width: 18rem; height: 100%;">
                        <div class="card-header">
                            #{{ $post->id }} - Posted By: {{ $post->user->name }}
                        </div>
                        <div class="card-body d-flex flex-column h-100">
                            <h5 class="card-title">${{ $post->title }}</h5>
                            <p class="card-text">{{ $post->body }}</p>
                            <p class="card-text">Enabled: {{ $post->enabled ? 'Yes' : 'No' }}</p>
                            <p class="card-text">Post Date: {{ $post->created_at }}</p>
                            <p class="card-text">Last Update: {{ $post->updated_at }}</p>

                            <div class="d-flex justify-content-between mt-auto">
                                @can('update', $post)
                                    <button onclick="window.location.href= '{{ route('posts.edit', $post->id) }}' "
                                        class="btn btn-primary btn-sm">Edit Post</button>
                                @endcan

                                @can('delete', $post)
                                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                @endcan

                            </div>
                        </div>
                    </div>

                </div>
            @endif
        @endforeach
    </div>

@endsection
