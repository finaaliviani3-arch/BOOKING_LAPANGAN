<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|integer|exists:posts,id',
            'content' => 'required|string',
        ]);

        $user = $request->user();
        $post = \App\Models\Post::findOrFail($request->post_id);

        // rules: user can comment only on his own post
        if ($user && $user->role === 'user' && $post->user_id !== $user->id) {
            abort(403);
        }

        \App\Models\Comment::create([
            'content' => $request->content,
            'post_id' => $post->id,
            'user_id' => $user->id,
        ]);

        return redirect()->route('posts.show', $post->id)->with('success', 'Komentar berhasil dibuat');
    }
}

