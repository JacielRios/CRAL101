<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homework;
use App\Http\Requests\Homework_sendRequest;
use App\Models\Homework_send;
use Illuminate\Support\Facades\Storage;


class CreateController extends Controller
{
    public function create(Homework $homework)
    {
        $homework;
        // dd($homework);
        return view('create-homework', compact('homework'));
    }
    public function store(Homework_sendRequest $request)
    {
        $max_size = (int)ini_get('upload_max_filesize') * 1024;
    
        $file = $request->file('file');
        $image = $request->file('image');
        
        if ($request->hasFile('file')) {
            if ($request->hasFile('image')){
                if (Storage::putFileAs('/public/homeworks_send' . '/', $file, $file->getClientOriginalName())){
                    Storage::putFileAs('/public/homeworks_send' . '/', $image, $image->getClientOriginalName());
                    Homework_send::create([
                    'user_id' => auth()->user()->id,
                    'name' => auth()->user()->name,
                    'grade' => auth()->user()->semester,
                    'group' => auth()->user()->group,
                    'turn' => auth()->user()->turn,
                    'file' => $file->getClientOriginalName(),
                    'image' => $image->getClientOriginalName(),]
                    + $request->all());
            }
        }else{
            if(Storage::putFileAs('/public/homeworks_send' . '/', $file, $file->getClientOriginalName())) {
                Homework_send::create([
                'user_id' => auth()->user()->id,
                'name' => auth()->user()->name,
                'grade' => auth()->user()->semester,
                'group' => auth()->user()->group,
                'turn' => auth()->user()->turn,
                'file' => $file->getClientOriginalName()]
                + $request->all());
            }
        }
        alert()->success('¡Éxito!','¡Has enviado esta tarea!')->showConfirmButton('Bien', '#01276d');
         return redirect()->route('homeworks.index');

    }elseif($request->hasFile('image')){
        if(Storage::putFileAs('/public/homeworks_send' . '/', $image, $image->getClientOriginalName())) {
            Homework_send::create([
            'user_id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'grade' => auth()->user()->semester,
            'group' => auth()->user()->group,
            'turn' => auth()->user()->turn,
            'image' => $image->getClientOriginalName()]
            + $request->all());
        }
        alert()->success('¡Éxito!','¡Has enviado esta tarea!')->showConfirmButton('Bien', '#01276d');
         return redirect()->route('homeworks.index');
    }
        Homework_send::create([
            'user_id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'grade' => auth()->user()->semester,
            'group' => auth()->user()->group,
            'turn' => auth()->user()->turn,]
            + $request->all());
        alert()->success('¡Éxito!','¡Has enviado esta tarea!')->showConfirmButton('Bien', '#01276d');
        return redirect()->route('homeworks.index');
    }
}
