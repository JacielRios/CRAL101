<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homework;
use App\Http\Requests\Homework_sendRequest;
use App\Models\Homework_send;

class CreateController extends Controller
{
    public function create(Homework $homework)
    {
        $homework;
        // dd($homework);
        return view('create-homework', compact('homework'));
    }
    public function store(Homework_sendRequest $request)
    {
        // $id = $homework->id;
        // dd($request->all());
        // dd($homework);
        $homework_send = Homework_send::create(
            ['user_id' => auth()->user()->id,
            'title' => $request->title,
            'body' => $request->body,
            'name'=> auth()->user()->name,
            'grade' => auth()->user()->semester,
            'group' => auth()->user()->group,
            'date' => $request->date,
            'turn' => auth()->user()->turn,
            'file' => $request->file,
            'homework_id' => $request->homework_id,
            ]
            );
            

         if ($request->file('file')) {
             $homework_send->file = $request->file('file')->store('homeworks_send', 'public');
             $homework_send->save();
         }
         return redirect()->route('homeworks.index');
    }
}
