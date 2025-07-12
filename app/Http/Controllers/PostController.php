<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // Create a new post
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return response()->json($post, 201);
    }

    // List all posts
    public function index()
    {
        return response()->json(Post::all());
    }

    // View a single post by ID
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return response()->json($post);
    }
}

