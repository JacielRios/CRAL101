<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $table = "chat";
    protected $fillable = [
        "usuario", "mensaje"
    ];

    public function scopeHour($query, $hour)    
    {
        if ($hour == "") {
            return $query->orderBy('created_at', 'desc');
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}