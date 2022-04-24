<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentHomework extends Model
{
    use HasFactory;

    protected $fillable = [
        'body', 
        'parent_id', 
        'homework_id', 
        'user_id',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function homework() 
    {
        return $this->belongsTo(Homework::class);
    }
 
    public function parentHome() 
    {
        return $this->belongsTo(CommentHomework::class, 'parent_id');
    }
 
    public function repliesHome() 
    {
        return $this->hasMany(CommentHomework::class, 'parent_id');
    }
}
