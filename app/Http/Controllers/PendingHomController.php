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

        if (isset($id_homework)) {
            foreach($id_homework as $id){
                $all = DB::table('Homework')
                ->where('id', '=', $id['homework_id'])
                ->where('grade', '=', auth()->user()->semester)
                ->where('group', '=', auth()->user()->group)
                ->where('turn', '=', auth()->user()->turn)
                ->where('carrer', '=', auth()->user()->carrer)
                ->get();
                $alls[] = $all[0];
            }
        }
        $tareas = DB::table('Homework')
        ->where('grade', '=', auth()->user()->semester)
        ->where('group', '=', auth()->user()->group)
        ->where('turn', '=', auth()->user()->turn)
        ->where('carrer', '=', auth()->user()->carrer)
        ->get();
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
            if (isset($alls)) {
                foreach($alls as $all){
                    if ($all == $ph){
                        $encontrado = true;
                    }
                }
            }
            if ($encontrado == false){
                $homeworks[] = $ph;
            }
        }
        if (isset($homeworks)) {
            return view('pending-user', compact('homeworks'));
        }else{
            return view('pending-user');
        }
            
    }
}
