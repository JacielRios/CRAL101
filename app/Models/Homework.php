<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'body',
        'date',
        'file',
        'turn',
        'theme',
        'grade',
        'group',
    ];  

    protected $dates = [

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function homeworks_sends()
    {
        return $this->hasMany(Homework_send::class);
    }
}