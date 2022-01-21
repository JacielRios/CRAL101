<?php

namespace App\Http\Controllers;
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
        return view('home', compact('posts'));
    }

    // public function post(Post $post)
    // {
    //     return view('home', ['post' => $post]);
    // }
}