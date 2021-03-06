<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body', 
        'parent_id', 
        'post_id', 
        'user_id',
    ];

    public function post() 
    {
        return $this->belongsTo(Post::class);
    }
 
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function homework() 
    {
        return $this->belongsTo(Homework::class);
    }
 
    public function parent() 
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
 
    public function replies() 
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
