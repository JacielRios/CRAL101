<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homework_send;
use App\Models\Homework;
use Illuminate\Support\Facades\DB;


class GradesUserController extends Controller
{
    public function index()
    {
        // $user_id = auth()->user()->id;

        // $homeworks_send =  Homework_send::where('user_id', '=', $user_id)->get();

        // foreach ($homeworks_send as $exists){
        //     $id_homework[] = ['homework_id' => $exists->homework_id];
        // }

        // if (isset($id_homework)) {
        //     foreach($id_homework as $id){
        //         $all = DB::table('Homework')
        //         ->where('id', '=', $id['homework_id'])
        //         ->get();
        //         $alls[] = $all[0];
        //     }
        // }
        
        // foreach($alls as $all){
        //     $course = $all->course;
        //     $courses[] = $course;
        // }
        // $courses = array_unique($courses);
        return view('calificaciones-user');
    }
}
