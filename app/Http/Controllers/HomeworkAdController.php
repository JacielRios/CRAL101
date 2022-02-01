<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homework;
use App\Http\Requests\HomeworkRequest;
use Illuminate\Support\Facades\Storage;



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
        // dd($request->all());
        $homework = Homework::create(
            ['user_id' => auth()->user()->id,
            'title' => $request->title,
            'body' => $request->body,
            'grade' => $request->grade,
            'group' => $request->group,
            'date' => $request->date,
            'turn' => $request->turn,
            'file' => $request->file]
            );
            

         if ($request->file('file')) {
             $homework->file = $request->file('file')->store('homeworks', 'public');
             $homework->save();
         }
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
        $homework->update($request->all());

        if ($request->file('file')) {
            Storage::disk('public')->delete($homework->file);
            $homework->file = $request->file('file')->store('homeworks', 'public');
            $homework->save();
        }
        
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
