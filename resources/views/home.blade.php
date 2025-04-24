@extends('main.layouts.main')

@section('title', 'Lab 1 & 2')

@section('content')
    <div class="container text-center my-5">
        <h1>Homepage</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi in expedita dicta culpa sint magni esse enim cum
            nihil est natus quaerat, soluta reiciendis minima at maiores! Eos, harum architecto!</p>
        <a href="{{ route('posts.index') }}" class="btn btn-primary btn-lg mt-3">View All Posts</a>
    </div>
@endsection
