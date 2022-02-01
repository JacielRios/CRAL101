<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homework_send;
use App\Http\Requests\Homework_sendRequest;

class HomeworksEvaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Homework_send $received)
    {
        // dd($received);
        $received;
        return view('evaluation-admin', compact('received'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Homework_send $received)
    {
        $request->validate([
            'quali' => ['digits_between:1,3', function($attribute, $value, $fail){
                if ($value > 100 ) {
                    $fail("100 es la calificación máxima");   
                }
            }],
        ]);
        $received->quali = $request->quali;

        $received->save();

        return redirect()->route('homework.index');
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
