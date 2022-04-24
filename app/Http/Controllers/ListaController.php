<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lists;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;


class ListaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('lista-admin');
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
        ## CODIGO PARA OBTENER LA CALIFICACION DE UN ALUMNO ##
        //  $user = "User";
        //  $students = $request;
        //  $students = $students->all();
        //  $admin = Arr::get($students, "parcial_2.$user");
        //  dd($admin);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($list)
    {
        $list = Lists::where('id', '=', $list)
        ->first();

        $notes_1 = $list->partial_1;
        $notes_2 = $list->partial_2;
        $notes_3 = $list->partial_3;
        $notes_prom = $list->prom;

        // dd($partial_1);

        $students = DB::table('users')
        ->where('semester', '=', $list->grade)
        ->where('group', '=', $list->group)
        ->where('carrer', '=', $list->carrer)
        ->where('turn', '=', $list->turn)
        ->get();
        // dd($students);

        // $partial_1 = $list[0]->partial_1;

        $partial_1[] = json_decode($notes_1, true);
        $partial_2[] = json_decode($notes_2, true);
        $partial_3[] = json_decode($notes_3, true);
        $prom[] = json_decode($notes_prom, true);

        // dd($explode_id);
        // foreach($students as $student)
        // {
        //     $admin[] = Arr::get($explode_id, "partial_1.$student->name");
        // }
        // dd($admin);

        return view('lista-admin', compact('list', 'students', 'partial_1', 'partial_2', 'partial_3', 'prom'));
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
