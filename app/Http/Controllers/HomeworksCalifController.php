<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homework;
use App\Models\Homework_send;
use App\Http\Requests\Homework_sendRequest;


class HomeworksCalifController extends Controller
{
    public function index(Homework $homework)
    {
        $homework;
        // dd($homework->id); 
        $homeworks_received = Homework_send::where('homework_id', '=', $homework->id)->get(); 
        // dd($homeworks_received); 

        return view('received-admin', compact('homeworks_received'));
    }

    public function received(Homework_send $received)
    {
        $received;
        return redirect()->route('received.edit', compact('received'));
    }
}
