<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{
    // CREATE VIEW
    public function create(): View
    {
        return view('Admin.Post.create');
    }

    // STORE
    public function store(PostStoreRequest $request) //RedirectResponse
    {
        $data = $request->validated();

        if($request->hasFile('image'))
        {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        Auth::user()->posts()->create($data);

        return redirect()->route('admin.dashboard')->with('success', 'Post has been succesfully created.');
    }

    // Show
    public function show(Post $id): View
    {
        return view('admin.post.show');
    }

    // Edit
    public function edit(Post $post): View
    {
        return view('Admin.Post.edit', compact('post'));
    }

    // Update
    public function update(PostStoreRequest $request, Post $post)
    {
        $data = $request->validated();

        if($request->hasFile('image'))
        {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($data);

        return Redirect()->route('admin.dashboard')->with('success', 'Post has been succesfully updated. ');
    }

    // Delete
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Post has been succesfully deleted');
    }
}
