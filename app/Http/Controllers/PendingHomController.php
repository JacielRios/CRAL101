<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homework_send;
use App\Models\Homework;
use Illuminate\Support\Facades\DB;

class PendingHomController extends Controller
{
    public function pending(Homework $homework, Homework_send $homework_send)
    {
        $id_user = auth()->user()->id;
        $exist = DB::table('homework_sends')
        ->where( 'user_id', '=', $id_user)
        ->get();
        // dd($exist);

        foreach ($exist as $exists){
            $id_homework[] = ['homework_id' => $exists->homework_id];
        }

        foreach($id_homework as $id){
            $all = DB::table('Homework')
            ->where('id', '=', $id['homework_id'])
            ->get();
            $alls[] = $all[0];
        }
        // dd($homeworks);
        $tareas = DB::table('Homework')->get();
        // dd($tareas);
        // foreach($tareas as $tarea){
        //     $datas = DB::table('Homework')
        //     ->where('id', '!=', $tarea->id)
        //     ->get();
        //     $pending_homework[] = $datas[0];
        // }
        
        // dd($pending_homework);
        // $diff = array_udiff( $pending_homework, $homeworks,
        //     function ($obj_a, $obj_b){
        //         return $obj_a->id - $obj_b->id;
        //     }
        // );
        // dd($diff);
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
        // dd($homeworks);
        
        return view('pending-user', compact('homeworks'));
    }
}
