<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class PostsController extends Controller
{
    public function index() 
    {   
        $posts = Post::latest()->get();
        
        return view('posts.index', ['posts' => $posts]);
    }


    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }


    public function create()
    {
        return view('posts.create'); 
    }


    public function store()
    {
        $this->validatePost();
        $post = new Post(request(['title', 'excerpt', 'body']));
        $post->user_id = Auth::id();
        $post->save();

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }


    public function update(Post $post)
    {
        $post->update($this->validatePost());
        
        return redirect('/');
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/');
    }


    public function validatePost()
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
    }
}
