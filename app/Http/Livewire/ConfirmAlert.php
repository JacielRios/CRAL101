<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Homework;
use Illuminate\Support\Facades\Storage;


class ConfirmAlert extends Component
{
    public $homeworkId;
    
    public function render()
    {
        return view('livewire.confirm-alert');
    }
    public function destroy($homeworkId)
    {
        $homework = Homework::find($homeworkId);
        if($homework->file){
            unlink(storage_path('../public/storage/homeworks/'.$homework->file));
        }
        if($homework->image){
            unlink(storage_path('../public/storage/homeworks/'.$homework->image));
        }
        $homework->delete();
        return redirect()->route('homework.index');
    }  
}
