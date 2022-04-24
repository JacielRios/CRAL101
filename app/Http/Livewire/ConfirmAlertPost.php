<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ConfirmAlertPost extends Component
{
    public $postId;

    public function render()
    {
        return view('livewire.confirm-alert-post');
    }
    public function destroy($postId)
    {
        $post = Post::find($postId);
        if ($post->file) {
            unlink(storage_path('../public/storage/post/' . $post->file));
        }
        if ($post->image) {
            unlink(storage_path('../public/storage/post/' . $post->image));
        }
        // dd($post->comments();
        $comments = Comment::where('post_id', '=',$post->id)
        ->get();

        // dd($comments);
        
        // $comment->replies->sortDesc()->each->delete();
        $comments->sortKeysDesc()->each->delete();
        $post->delete();
        return redirect()->route('home.index');
    }
}
