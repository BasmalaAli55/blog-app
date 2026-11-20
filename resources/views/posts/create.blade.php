
@extends('layouts.app')

@section('content')

<h2>Create Post</h2>

<form method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Title</label>

        <input type="text"
               name="title"
               class="form-control"
               value="{{ old('title') }}">
    </div>

    <div class="mb-3">
        <label>Body</label>

        <textarea name="body"
                  class="form-control"
                  rows="5">{{ old('body') }}</textarea>
    </div>

    <div class="form-check mb-3">
        <input type="checkbox"
               name="is_published"
               value="1"
               class="form-check-input">

        <label class="form-check-label">
            Publish
        </label>
    </div>

    <div class="mb-3">
    <label>Post Image</label>

    <input type="file"
           name="image"
           class="form-control">
</div>

    <button class="btn btn-primary">
        Save Post
    </button>

</form>

@endsection

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@error('title')
    <div class="text-danger">{{ $message }}</div>
@enderror

@error('body')
    <div class="text-danger">{{ $message }}</div>
@enderror
