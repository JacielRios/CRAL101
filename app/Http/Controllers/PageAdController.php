<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Comment;
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

        foreach($posts as $post)
        {
        $comments = Comment::where('post_id', '=', $post->id)
        // ->whereNull('parent_id')
        ->latest()
        ->get();
        // dd($comments);
        $count[] = count($comments);
        }
        // dd($count);
        if(isset($count)){
            return view('home-admin', compact('posts', 'count'));
        }
        else{
            return view('home-admin', compact('posts',));
        }
    
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
        $max_size = (int)ini_get('upload_max_filesize') * 1024;
        $file = $request->file('file');
        $image = $request->file('image');
        
        if ($request->hasFile('file')) {
            if ($request->hasFile('image')){
                if (Storage::putFileAs('/public/post' . '/', $file, $file->getClientOriginalName())){
                    Storage::putFileAs('/public/post' . '/', $image, $image->getClientOriginalName());
                    Post::create([
                    'user_id' => auth()->user()->id,
                    'file' => $file->getClientOriginalName(),
                    'image' => $image->getClientOriginalName(),]
                    + $request->all());
            }
        }else{
            if(Storage::putFileAs('/public/post' . '/', $file, $file->getClientOriginalName())) {
                Post::create([
                'user_id' => auth()->user()->id,
                'file' => $file->getClientOriginalName()]
                + $request->all());
            }
        }
        alert()->success('¡Éxito!','¡Has creado una nueva publicación!')->showConfirmButton('Bien', '#01276d');
        return redirect()->route('home.index');

    }elseif($request->hasFile('image')){
        if(Storage::putFileAs('/public/post' . '/', $image, $image->getClientOriginalName())) {
            Post::create([
            'user_id' => auth()->user()->id,
            'image' => $image->getClientOriginalName()]
            + $request->all());
        }
        alert()->success('¡Éxito!','¡Has creado una nueva publicación!')->showConfirmButton('Bien', '#01276d');
        return redirect()->route('home.index');
    }
        Post::create([
            'user_id' => auth()->user()->id]
            + $request->all());
            alert()->success('¡Éxito!','¡Has creado una nueva publicación!')->showConfirmButton('Bien', '#01276d');
        return redirect()->route('home.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            return view('home-post-admin', compact('post', 'count'));
        }
        else{
            return view('home-post-admin', compact('post',));
        }
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
        if($post->file){
            if($request->file('file')){
                unlink(storage_path('../public/storage/post/'.$post->file));
            }
        }
        if($post->image){
            if($request->file('image')){
                unlink(storage_path('../public/storage/post/'.$post->image));
            }
        }
        $post->update($request->all());
        $file = $request->file('file');
        $image = $request->file('image');
        
        if ($request->hasFile('file')) {
            if ($request->hasFile('image')){
                if (Storage::putFileAs('/public/post' . '/', $file, $file->getClientOriginalName())){
                    Storage::putFileAs('/public/post' . '/', $image, $image->getClientOriginalName());
                    $post->file = $file->getClientOriginalName();
                    $post->image = $image->getClientOriginalName();
                    $post->save();
            }
        }else{
            if(Storage::putFileAs('/public/post' . '/', $file, $file->getClientOriginalName())) {
                $post->file = $file->getClientOriginalName();
                $post->save();
            }
        }
        alert()->success('¡Éxito!','¡Has actualizado esta publicación!')->showConfirmButton('Bien', '#01276d');
        return redirect()->route('home.index');

    }elseif($request->hasFile('image')){
        if(Storage::putFileAs('/public/post' . '/', $image, $image->getClientOriginalName())) {
            $post->image = $image->getClientOriginalName();
            $post->save();
        }
        alert()->success('¡Éxito!','¡Has actualizado esta publicación!')->showConfirmButton('Bien', '#01276d');
        return redirect()->route('home.index');
    }
    alert()->success('¡Éxito!','¡Has actualizado esta publicación!')->showConfirmButton('Bien', '#01276d');        
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
        Storage::disk('public')->delete($post->image);
        $post->delete();

        return back();
    }
}
