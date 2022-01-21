<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PageAdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //  if ($theme=$request->get('theme')) 
        //  {
        //       $theme=$request->get('theme');
        //       $semester=$request->get('semester');
        //       $turn=$request->get('turn');
        //      $posts = DB::table('posts')
        //          ->where('theme', '=', $theme)
        //          ->get();
                
                
        //         return view('home-admin', ['posts'=>$posts, 'theme'=>$theme]);
        // }
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
        return view('home-admin', compact('posts'));
    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('create-post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // dd($request);
        $post = Post::create([
            'user_id' => auth()->user()->id]
            + $request->all());
            
         if ($request->file('file')) {
             $post->file = $request->file('file')->store('posts', 'public');
             $post->save();
         }
         return redirect()->route('home.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('edit-post', compact('post')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());

        if ($request->file('file')) {
            Storage::disk('public')->delete($post->file);
            $post->file = $request->file('file')->store('posts', 'public');
            $post->save();
        }
        
        return redirect()->route('home.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::disk('public')->delete($post->file);
        $post->delete();

        return back();
    }
}
