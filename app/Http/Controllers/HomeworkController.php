<?php

namespace App\Http\Controllers;

use App\Models\Homework;
use Illuminate\Http\Request;
use App\Http\Requests\Homework_sendRequest;
use App\Models\CommentHomework;
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
            ->where('grade', '=', auth()->user()->semester)
            ->where('group', '=', auth()->user()->group)
            ->where('turn', '=', auth()->user()->turn)
            ->where('carrer', '=', auth()->user()->carrer)
            ->latest()
            ->paginate(10);

        foreach ($homeworks as $homework) {
            $comments = CommentHomework::where('homework_id', '=', $homework->id)
                //->whereNull('parent_id')
                ->latest()
                ->get();
            // dd($comments);
            $count[] = count($comments);
        }
        if (isset($count)) {
            return view('posts-user', compact('homeworks', 'count'));
        } else {
            return view('posts-user', compact('homeworks'));
        }
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
    public function store(Homework_sendRequest $request, Homework $homework)
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
            ->where('user_id', '=', $id_user)
            ->get();
        $homework;
        $comments = CommentHomework::where('homework_id', '=', $homework->id)
            // ->whereNull('parent_id')
            ->latest()
            ->get();
        $count = count($comments);
        foreach ($completed as $exists) {
            $id_homework[] = ['homework_id' => $exists->homework_id];
        }

        if (isset($id_homework)) {
            foreach ($id_homework as $id) {
                $all = DB::table('homework')
                    ->where('id', '=', $id['homework_id'])
                    ->get();
                $alls[] = $all[0];
            }

            $tareas = DB::table('homework')->get();

            $pending_homework = json_decode($tareas);
            foreach ($pending_homework as $ph) {
                $encontrado = false;
                foreach ($alls as $all) {
                    if ($all == $ph) {
                        $encontrado = true;
                    }
                }
                if ($encontrado == false) {
                    $homeworks[] = $ph;
                }
            }
            $homeworks;
            $check = json_decode($homework);
            // dd($homeworks);

            if (isset($homeworks)) {
                foreach ($homeworks as $pending) {
                    $exist = false;
                    if ($check->id == $pending->id) {
                        $exist = true;
                        if (isset($count)) {
                            return view('post-user', ['homework' => $homework], compact('exist', 'count'));
                        } else {
                            return view('post-user', ['homework' => $homework], compact('exist'));
                        }
                        
                    }
                }
            }


            foreach ($completed as $complete) {
                if ($complete->homework_id == $check->id) {
                    $complete;
                    $exist = false;
                    if (isset($count)) {
                        return view('post-user', ['homework' => $homework], compact('exist', 'complete', 'count'));
                    } else {
                        return view('post-user', ['homework' => $homework], compact('exist', 'complete'));
                    }
                    
                }
            }
        } else {
            $exist = true;
            
            if (isset($count)) {
                return view('post-user', ['homework' => $homework], compact('exist', 'count'));
            } else {
                return view('post-user', ['homework' => $homework], compact('exist'));
            }
            
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
        $exists = Homework_send::where('user_id', '=', $id_user)->get();
        foreach ($exists as $exist) {
            if ($exist->homework_id == $id_homework) {
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
    public function update(Homework_sendRequest $request, Homework_send $homework)
    {
        if ($homework->file) {
            if ($request->file('file')) {
                unlink(storage_path('../public/storage/homeworks_send/' . $homework->file));
            }
        }
        if ($homework->image) {
            if ($request->file('image')) {
                unlink(storage_path('../public/storage/homeworks_send/' . $homework->image));
            }
        }
        $homework->update($request->all());
        $file = $request->file('file');
        $image = $request->file('image');

        if ($request->hasFile('file')) {
            if ($request->hasFile('image')) {
                if (Storage::putFileAs('/public/homeworks_send' . '/', $file, $file->getClientOriginalName())) {
                    Storage::putFileAs('/public/homeworks_send' . '/', $image, $image->getClientOriginalName());
                    $homework->file = $file->getClientOriginalName();
                    $homework->image = $image->getClientOriginalName();
                    $homework->save();
                }
            } else {
                if (Storage::putFileAs('/public/homeworks_send' . '/', $file, $file->getClientOriginalName())) {
                    $homework->file = $file->getClientOriginalName();
                    $homework->save();
                }
            }
            alert()->success('¡Éxito!', '¡Has actualizado esta tarea!')->showConfirmButton('Bien', '#01276d');
            return redirect()->route('homeworks.index');
        } elseif ($request->hasFile('image')) {
            if (Storage::putFileAs('/public/homeworks_send' . '/', $image, $image->getClientOriginalName())) {
                $homework->image = $image->getClientOriginalName();
                $homework->save();
            }
            alert()->success('¡Éxito!', '¡Has actualizado esta tarea!')->showConfirmButton('Bien', '#01276d');
            return redirect()->route('homeworks.index');
        }
        alert()->success('¡Éxito!', '¡Has actualizado esta tarea!')->showConfirmButton('Bien', '#01276d');
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
