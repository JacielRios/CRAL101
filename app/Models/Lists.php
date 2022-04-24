<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'turn',
        'course',
        'grade',
        'group',
        'carrer',
        'partial_1',
        'partial_2',
        'partial_3',
        'prom',
    ];  

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
