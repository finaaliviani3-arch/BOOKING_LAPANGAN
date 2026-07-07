<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $query = \App\Models\Post::with('user')->latest();

        // rules: admin sees all, user sees only his posts
        if ($user && $user->role === 'user') {
            $query->where('user_id', $user->id);
        }

        $posts = $query->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = \App\Models\Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user()->id,
        ]);

        return redirect()->route('posts.show', $post->id)->with('success', 'Post berhasil dibuat');
    }

    public function show(string $id, Request $request)
    {
        $post = \App\Models\Post::with(['user', 'comments.user'])
            ->findOrFail($id);

        // rules: user can only view his own posts
        if ($request->user() && $request->user()->role === 'user' && $post->user_id !== $request->user()->id) {
            abort(403);
        }

        return view('posts.show', compact('post'));
    }

    public function edit(string $id, Request $request)
    {
        $post = \App\Models\Post::findOrFail($id);

        if ($request->user() && $request->user()->role === 'user' && $post->user_id !== $request->user()->id) {
            abort(403);
        }

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = \App\Models\Post::findOrFail($id);

        if ($request->user()->role === 'user' && $post->user_id !== $request->user()->id) {
            abort(403);
        }

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.show', $post->id)->with('success', 'Post berhasil diupdate');
    }

    public function destroy(string $id, Request $request)
    {
        $post = \App\Models\Post::findOrFail($id);

        if ($request->user()->role === 'user' && $post->user_id !== $request->user()->id) {
            abort(403);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus');
    }
}

