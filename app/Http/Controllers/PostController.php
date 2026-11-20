<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
{
   $data = $request->validate([
    'title' => 'required|min:5',
    'body' => 'required|min:20',
    'image' => 'nullable|image|mimes:jpg,png|max:2048',
]);

if ($request->hasFile('image')) {
    $data['image'] = $request->file('image')
        ->store('posts', 'public');
}




    $data['is_published'] = $request->boolean('is_published');

    Post::create($data);

    return redirect()->route('posts.index');

    
}

    public function show(Post $post)
{
    return view('posts.show', compact('post'));
}

    public function edit(Post $post)
    {
        //
    }

  public function update(Request $request, Post $post)
{
    $data = $request->validate([
        'title' => 'required|min:5',
        'body' => 'required|min:20',
        'image' => 'nullable|image|mimes:jpg,png|max:2048',
    ]);

    if ($request->hasFile('image')) {

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $data['image'] = $request->file('image')
            ->store('posts', 'public');
    }

    $data['is_published'] = $request->boolean('is_published');

    $post->update($data);

    return redirect()->route('posts.index')
        ->with('success', 'Post updated successfully!');
}

    public function destroy(Post $post)
{
    if ($post->image) {
        Storage::disk('public')->delete($post->image);
    }

    $post->delete();

    return redirect()->route('posts.index')
        ->with('success', 'Post deleted successfully!');
}
}