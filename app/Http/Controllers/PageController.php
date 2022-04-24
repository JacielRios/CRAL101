<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // public function posts()
    //  {
    //     $posts = ['posts' => Post::with('users')->latest()->paginate()];

    //     return view('home')->with($posts);
    // }
    public function index(Request $request)
    {
        $date     = $request->get('date');
        $theme    = $request->get('theme');
        $semester = $request->get('semester');
        $turn     = $request->get('turn');

        $posts = Post::with('user')
            ->theme($theme)
            ->semester($semester)
            ->turn($turn)
            ->date($date)
            ->latest()
            ->paginate(10);
        foreach ($posts as $post) {
            $comments = Comment::where('post_id', '=', $post->id)
                // ->whereNull('parent_id')
                ->latest()
                ->get();
            // dd($comments);
            $count[] = count($comments);
        }
        // dd($count);
        if (isset($count)) {
            return view('home', compact('posts', 'count'));
        } else {
            return view('home', compact('posts',));
        }
    }

    public function show($post)
    {
        $comments = Comment::where('post_id', '=', $post)
        // ->whereNull('parent_id')
        ->latest()
        ->get();
        // // dd($comments);
        // dd(count($comments));
        $count = count($comments);
        // // dd($comments);
        
        // $replies = Comment::where('post_id', '=', $post)
        // ->whereNotNull('parent_id')
        // ->latest()
        // ->get();
        // dd($replies);


        // // foreach($replies as $reply)
        // // {
        // //     $replies_1 = Comment::where('post_id', '=', $post)
        // //     ->whereNotNull('parent_id')
        // //     ->where('parent_id', '=', $reply->id)
        // //     ->latest()
        // //     ->get();  
        // // }
        // // dd($replies_1);
        $post = Post::where('id', '=', $post)->first();
        
        // // dd($post);
        // if(isset($replies_1))
        // {
        //     return view('home-post-admin', compact('post', 'comments', 'replies', 'replies_1'));
        // }else
        if(isset($count)){
            return view('home-post', compact('post', 'count'));
        }
        else{
            return view('home-post', compact('post',));
        }
    }
}
