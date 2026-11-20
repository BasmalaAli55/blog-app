@extends('layouts.app')

@section('content')

<h2>Edit Post</h2>

<form method="POST" enctype="multipart/form-data">   

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Title</label>

        <input type="text"
               name="title"
               class="form-control"
               value="{{ old('title', $post->title) }}">

        @error('title')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label>Body</label>

        <textarea name="body"
                  class="form-control"
                  rows="5">{{ old('body', $post->body) }}</textarea>

        @error('body')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-check mb-3">
        <input type="checkbox"
               name="is_published"
               value="1"
               class="form-check-input"
               {{ old('is_published', $post->is_published) ? 'checked' : '' }}>

        <label class="form-check-label">Publish</label>
    </div>

    <div class="mb-3">
    <label>Post Image</label>

    <input type="file"
           name="image"
           class="form-control">
</div>

    <button class="btn btn-primary">Update Post</button>

</form>

@endsection