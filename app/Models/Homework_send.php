<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework_send extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'name',
        'user_id',
        'body',
        'file',
        'turn',
        'grade',
        'group',
        'homework_id',
        'quali',
        'image',
    ];  

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function homework()
    {
        return $this->belongsTo(Homework::class);
    }
    public function getGetExcerptAttribute($key)
    {
      return substr($this->body, 0, 140);
    }
    public function getGetFileAttribute($key)
    {
      if ($this->file) {
        return url("storage/$this->file");
      }
    }
}
