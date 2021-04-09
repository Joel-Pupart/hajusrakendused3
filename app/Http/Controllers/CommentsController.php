<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentsController extends Controller
{
    public function store()
    {
        $this->validateComment();
        $comment = new Comment(request(['body', 'post_id']));
        $comment->save();

        return redirect('/' . request('post_id'));
    }

    public function destroy($id, $post)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect('/' . $post);
    }

    public function validateComment()
    {
        return request()->validate([
            'body' => 'required',
            'post_id' => 'exists:posts,id'
        ]);
    }
}
