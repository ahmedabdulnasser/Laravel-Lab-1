@extends('main.layouts.main')

@section('title', 'Show: Lab 1 & 2')
@section('content')
    <h5 class="card-title">${{ $post->title }}</h5>
    <p class="card-text">{{ $post->body }}</p>
    <p class="card-text">Enabled: {{ $post->enabled ? 'Yes' : 'No' }}</p>
    <p class="card-text">Post Date: {{ $post->created_at }}</p>
    <p class="card-text">Last Update: {{ $post->updated_at }}</p>


@endsection
