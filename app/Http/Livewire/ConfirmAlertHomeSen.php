<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Homework_send;
use Illuminate\Support\Facades\Storage;


class ConfirmAlertHomeSen extends Component
{
    public $homework_senId;
    
    public function render()
    {
        return view('livewire.confirm-alert-home-sen');
    }
    public function destroy($homework_senId)
    {
        $homework = Homework_send::find($homework_senId);
        if($homework->file){
            unlink(storage_path('../public/storage/homeworks_send/'.$homework->file));
        }
        if($homework->image){
            unlink(storage_path('../public/storage/homeworks_send/'.$homework->image));
        }
        $homework->delete();
        return redirect()->route('homeworks.index');
    }  
}
