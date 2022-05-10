<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\CommentHomework;
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

        $comments = CommentHomework::where('homework_id', '=', $homework->id)
        ->get();

        // dd($comments);
        
        // $comment->replies->sortDesc()->each->delete();
        $comments->sortKeysDesc()->each->delete();
        $homework->delete();
        return redirect()->route('homework.index');
    }  
}
