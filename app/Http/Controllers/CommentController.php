<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use \App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'content' => 'required|string',
            'post_id' => 'required|exists:posts,id',
        ]);

        Comment::create($request->all());

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    public function create()
    {
        $post = Post::all();
        return view('comments.create',compact('post'));
    }

    public function show()
    {
        $post = Post::all();
        return view('comments.create', compact('post'));
    }
}
