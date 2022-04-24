<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListsUserController extends Controller
{
    public function lists_user() 
    {
        $user = Auth()->user();
        // dd($user->semester);
        
        $lists = Lists::where('grade', '=', $user->semester)
        ->where('group', '=', $user->group)
        ->where('carrer', '=', $user->carrer)
        ->where('turn', '=', $user->turn)
        ->get();

        return view('calificaciones-user', compact('lists'));
    }

    public function list_user($list)
    {
        $list = Lists::where('id', '=', $list)
        ->get();

        // dd($list->title);

        $students = user::where('semester', '=', $list[0]->grade)
        ->where('group', '=', $list[0]->group)
        ->where('carrer', '=', $list[0]->carrer)
        ->where('turn', '=', $list[0]->turn)
        ->get();

        // dd($students);

        $partial_1_ = $list[0]->partial_1;
        $partial_2_ = $list[0]->partial_2;
        $partial_3_ = $list[0]->partial_3;
        $prom_ = $list[0]->prom;

        $partial_1[] = json_decode($partial_1_, true);
        $partial_2[] = json_decode($partial_2_, true);
        $partial_3[] = json_decode($partial_3_, true);
        $prom[] = json_decode($prom_, true);

        // dd($partial_1);

        $name = User::where('id', '=', $list[0]->user_id)
        ->first();

        // dd($name->name);
        return view('list-user', compact('list', 'students', 'partial_1', 'partial_2', 'partial_3', 'prom', 'name'));
    }
}
