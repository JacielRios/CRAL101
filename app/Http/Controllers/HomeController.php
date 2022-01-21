<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\support\Facades\auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminviews', ['only'=>'index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // public function posts()
    // {
    //     return view('home', [
    //         'posts' => Post::with('users')->latest()->paginate()]);
    // }

    // public function post(Post $post)
    // {
    //     return view('home', ['post' => $post]);
    // }
}
