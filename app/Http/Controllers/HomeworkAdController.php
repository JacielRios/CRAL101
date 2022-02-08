<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homework;
use App\Http\Requests\HomeworkRequest;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;



class HomeworkAdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeworks = Homework::with('user')
                    ->where('user_id', '=', auth()->user()->id)
                    ->latest()
                    ->paginate(10);
        return view('posts-admin', compact('homeworks'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HomeworkRequest $request)
    {

        $max_size = (int)ini_get('upload_max_filesize') * 1024;
        $file = $request->file('file');
        $image = $request->file('image');
        
        if ($request->hasFile('file')) {
            if ($request->hasFile('image')){
                if (Storage::putFileAs('/public/homeworks' . '/', $file, $file->getClientOriginalName())){
                    Storage::putFileAs('/public/homeworks' . '/', $image, $image->getClientOriginalName());
                    Homework::create([
                    'user_id' => auth()->user()->id,
                    'file' => $file->getClientOriginalName(),
                    'image' => $image->getClientOriginalName(),]
                    + $request->all());
            }
        }else{
            if(Storage::putFileAs('/public/homeworks' . '/', $file, $file->getClientOriginalName())) {
                Homework::create([
                'user_id' => auth()->user()->id,
                'file' => $file->getClientOriginalName()]
                + $request->all());
            }
        }
        alert()->success('¡Éxito!','¡Has publicado un nueva tarea!')->showConfirmButton('Bien', '#01276d');
        return redirect()->route('homework.index');

    }elseif($request->hasFile('image')){
        if(Storage::putFileAs('/public/homeworks' . '/', $image, $image->getClientOriginalName())) {
            Homework::create([
            'user_id' => auth()->user()->id,
            'image' => $image->getClientOriginalName()]
            + $request->all());
        }
        alert()->success('¡Éxito!','¡Has publicado un nueva tarea!')->showConfirmButton('Bien', '#01276d');
        return redirect()->route('homework.index');
    }
        Homework::create([
            'user_id' => auth()->user()->id]
            + $request->all());
        alert()->success('¡Éxito!','¡Has publicado un nueva tarea!')->showConfirmButton('Bien', '#01276d');
        return redirect()->route('homework.index');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Homework $homework)
    {
            $homework;
            return view('post-admin', compact('homework'));
        // return view('post-admin', ['Homework' => $homework]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Homework $homework)
    {
        $homework;
        return view('edit-homework', compact('homework'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HomeworkRequest $request, Homework $homework)
    {
        if($homework->file){
            if($request->file('file')){
                unlink(storage_path('../public/storage/homeworks/'.$homework->file));
            }
        }
        if($homework->image){
            if($request->file('image')){
                unlink(storage_path('../public/storage/homeworks/'.$homework->image));
            }
        }
        $homework->update($request->all());
        $file = $request->file('file');
        $image = $request->file('image');
        
        if ($request->hasFile('file')) {
            if ($request->hasFile('image')){
                if (Storage::putFileAs('/public/homeworks' . '/', $file, $file->getClientOriginalName())){
                    Storage::putFileAs('/public/homeworks' . '/', $image, $image->getClientOriginalName());
                    $homework->file = $file->getClientOriginalName();
                    $homework->image = $image->getClientOriginalName();
                    $homework->save();
            }
        }else{
            if(Storage::putFileAs('/public/homeworks' . '/', $file, $file->getClientOriginalName())) {
                Storage::disk('public')->delete($homework->file);
                    $homework->file = $file->getClientOriginalName();
                    $homework->save();
            }
        }
        alert()->success('¡Éxito!','¡Has actualizado esta tarea!')->showConfirmButton('Bien', '#01276d');
        return redirect()->route('homework.index');

    }elseif($request->hasFile('image')){
        if(Storage::putFileAs('/public/homeworks' . '/', $image, $image->getClientOriginalName())) {
                $homework->image = $image->getClientOriginalName();
                $homework->save();
        }        
        alert()->success('¡Éxito!','¡Has actualizado esta tarea!')->showConfirmButton('Bien', '#01276d');
        return redirect()->route('homework.index');
    }        
    alert()->success('¡Éxito!','¡Has actualizado esta tarea!')->showConfirmButton('Bien', '#01276d');
        return redirect()->route('homework.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Homework $homework)
    {
        Storage::disk('public')->delete($homework->file);
        $homework->delete();
        
        return redirect()->route('homework.index');
    }
}
