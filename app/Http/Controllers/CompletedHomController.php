<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\Homework_send;
use App\Models\Homework;
use Illuminate\Support\Facades\DB;

class CompletedHomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Homework $homework, Homework_send $homework_send)
    {
        $id_user = auth()->user()->id;
        $exist = DB::table('homework_sends')
        ->where( 'user_id', '=', $id_user)
        ->get();

        // dd($exist);

        foreach ($exist as $exists){
            $id_homework[] = ['homework_id' => $exists->homework_id];
        }

        // dd($id_homework);

        foreach($id_homework as $id){
        $homework = DB::table('Homework')
        ->where('id', '=', $id['homework_id'])
        ->get();
        $homeworks[] = $homework[0];
        }

        // dd($homeworks);

        return view('completed-user', compact('homeworks'));
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
