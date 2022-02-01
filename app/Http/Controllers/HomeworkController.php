<?php

namespace App\Http\Controllers;

use App\Models\Homework;
use Illuminate\Http\Request;
use App\Http\Requests\Homework_sendRequest;
use App\Models\Homework_send;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Mockery\Undefined;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Homework $homework)
    {
        $homeworks = Homework::with('user')
        ->latest()
        ->paginate(10);
        return view('posts-user', compact('homeworks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Homework $homework)
    {
        // $homework;
        // dd($homework);
        // return view('create-homework', compact('homework'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Homework_sendRequest $request,Homework $homework)
    {
        // $homework;
        // // dd($homework);
        //     $homework_send = Homework_send::create(
        //     ['user_id' => auth()->user()->id,
        //     'homework_id' => $homework->id,
        //     'title' => $request->title,
        //     'body' => $request->body,
        //     'name'=> auth()->user()->name,
        //     'grade' => auth()->user()->semester,
        //     'group' => auth()->user()->group,
        //     'date' => $request->date,
        //     'turn' => auth()->user()->turn,
        //     'file' => $request->file,]
        //     );


        //  if ($request->file('file')) {
        //      $homework_send->file = $request->file('file')->store('homeworks_send', 'public');
        //      $homework_send->save();
        //  }
        //  return redirect()->route('homeworks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Homework $homework)
    {
        $id_user = auth()->user()->id;
        $completed = DB::table('homework_sends')
        ->where( 'user_id', '=', $id_user)
        ->get();
        $homework;

        foreach ($completed as $exists){
            $id_homework[] = ['homework_id' => $exists->homework_id];
        }

        if (isset($id_homework)) {
            foreach($id_homework as $id){
                $all = DB::table('Homework')
                ->where('id', '=', $id['homework_id'])
                ->get();
                $alls[] = $all[0];
            }
    
            $tareas = DB::table('Homework')->get();
    
            $pending_homework = json_decode($tareas);
            foreach($pending_homework as $ph){
                $encontrado = false;
                foreach($alls as $all){
                    if ($all == $ph){
                        $encontrado = true;
                    }
                }
                if ($encontrado == false){
                    $homeworks[] = $ph;
                }
            }
            $homeworks;
            $check = json_decode($homework);
            // dd($homeworks);
    
            foreach($homeworks as $pending){
                $exist = false;
                if ($check->id == $pending->id) {
                    $exist = true;
                    return view('post-user', ['homework' => $homework], compact('exist'));
                }
            }
            
            foreach($completed as $complete){
                if ($complete->homework_id == $check->id ) {
                    $complete;
                    return view('post-user', ['homework' => $homework], compact('exist', 'complete'));
                }
            }  
        }else{
            $exist = true;
            return view('post-user', ['homework' => $homework], compact('exist'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Homework $homework, Homework_send $homework_send)
    {
        $id_homework = $homework->id;
        $id_user = auth()->user()->id;
        $exists = Homework_send::where( 'user_id', '=', $id_user)->get();
        foreach($exists as $exist){
            if ($exist->homework_id == $id_homework){
                $homework = $exist;
            }
        }
        // dd($homework);
        return view('update-homework', compact('homework'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Homework_sendRequest $request,Homework_send $homework)
    {
        // dd($homework);
        $homework->update($request->all());

        if ($request->file('file')) {
            Storage::disk('public')->delete($homework->file);
            $homework->file = $request->file('file')->store('homeworks_send', 'public');
            $homework->save();
        }

        return redirect()->route('homeworks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
