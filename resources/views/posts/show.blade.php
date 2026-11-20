@extends('layouts.app')

@section('content')

<h2>Post Details</h2>

<div class="card">
    <div class="card-body">

        <h4>{{ $post->title }}</h4>

        <p>{{ $post->body }}</p>

        <p>
            Status:
            {{ $post->is_published ? 'Published' : 'Draft' }}
        </p>

        <a href="{{ route('posts.index') }}"
           class="btn btn-secondary">
            Back
        </a>

    </div>
</div>

@endsection

@if ($post->image)
    <img src="{{ asset('storage/' . $post->image) }}"
         width="200"
         alt="Post Image"
         class="mb-3">
@else
    <p class="text-muted">No Image</p>
@endif