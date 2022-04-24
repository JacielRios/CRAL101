<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentHomework;
use App\Models\Homework;
use App\Models\Post;



use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        // dd($request->all());
        $comment = new Comment();
        $comment->body = $request->body;
        $comment->parent_id = $request->parent_id;
        $comment->user_id = auth()->user()->id;
 
        $post->comments()->save($comment);
 
        if(auth()->user()->role == 'admin'){
            return redirect()->route('home.show', $post);
        }
        if(auth()->user()->role == 'dir'){
            return redirect()->route('home.show', $post);
        }
        if(auth()->user()->role == 'user'){
            return redirect()->route('homeuser.show', $post);
        }
    }

    public function homework(Request $request, Homework $homework)
    {
        $comment = new CommentHomework();
        $comment->body = $request->body;
        $comment->parent_id = $request->parent_id;
        $comment->user_id = auth()->user()->id;
 
        $homework->comments()->save($comment);
 
        if(auth()->user()->role == 'admin'){
            return redirect()->route('homework.show', $homework);
        }
        if(auth()->user()->role == 'user'){
            return redirect()->route('homeworks.show', $homework);
        }
    }
}
