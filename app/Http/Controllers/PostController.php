<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PostCreatedNotification;


class PostController extends Controller
{
    public function index()
    {
        $post_user = User::all();
        $posts = Post::all();
        return view('post.index', compact('posts', 'post_user'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming image is optional and limited to 2MB with allowed formats
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image_locatiom = '/Post_images/';
            $image->move(public_path() . $image_locatiom, $imageName);
            $imagePath = $image_locatiom . $imageName;
        }
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->image = $imagePath;
        $post->user_id = Auth::id();
        $post->published_at = $request->published_at;
        

        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('public/images');
        //     $post->image = $imagePath;
        // }
        $post->save();
        $post->user->notify(new PostCreatedNotification());

        return redirect()->route('post.index')->with('success', 'Post created successfully.');
    }

    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        return view('post.edit', compact('posts'));
    }

    public function show($id)
    {
        $posts = Post::findOrFail($id);
        return view('post.show', compact('posts'));
    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('post.index')->with('success', 'Post deleted successfully.');
    }
}
