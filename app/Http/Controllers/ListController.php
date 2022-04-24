<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lists;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;


class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('calificaciones-admin');
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
        // dd($request->all());

        Lists::create([
            'user_id' => auth()->user()->id]
            + $request->all());
        alert()->success('¡Éxito!','¡Has creado una lista nueva!')->showConfirmButton('Bien', '#01276d');
        return redirect()->route('lists.index');
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
    public function update(Request $request, Lists $list, $id)
    {
        $list = Lists::where('id', '=', $id)
        ->first();
        
        $qualifications = $request->all();
        $partial_1[] = $qualifications['partial_1'];
        $partial_2[] = $qualifications['partial_2'];
        $partial_3[] = $qualifications['partial_3'];
        $prom[] = $qualifications['prom'];

        // [$keys, $values] = Arr::divide($partial_1[0]);
        // dd($partial_1[0]["Jaciel Benito Rios Martinez"]);
        // dd($students);
        // dd($prom)
        // foreach($names as $name)
        // {
        //     $admin[] = Arr::get($students, "partial_1.$name->name");
        // }
        // dd($admin);

        // dd($request->all());

        $list->update($request->all());

        // $first = Arr::first($partial_1[0], function ($value, $key ) {
        //     return $key == $student->name;
        // });
        // dd($first);

        $students = DB::table('users')
        ->where('semester', '=', $list->grade)
        ->where('group', '=', $list->group)
        ->where('carrer', '=', $list->carrer)
        ->where('turn', '=', $list->turn)
        ->get();

        return view('lista-admin', compact('partial_1', 'partial_2', 'partial_3', 'prom', 'list', 'students',));
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
