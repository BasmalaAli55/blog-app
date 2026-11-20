
@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h2>All Posts</h2>

    <a href="{{ route('posts.create') }}"
       class="btn btn-primary">
        Create Post
    </a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Body</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>

                <td>
                    <a href="{{ route('posts.show', $post->id) }}"
                       class="btn btn-info">Show</a>

                    <a href="{{ route('posts.edit', $post->id) }}"
                       class="btn btn-warning">Edit</a>

                    <form action="{{ route('posts.destroy', $post->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')
                        <td>
    @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}"
             width="100"
             alt="Post Image">
    @else
        <span class="text-muted">No Image</span>
    @endif
</td>

                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

<button type="submit"
        class="btn btn-danger"
        onclick="return confirm('Are you sure you want to delete this post?')">
    Delete
</button>
