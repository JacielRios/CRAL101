<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'body',
        'file',
        'turn',
        'theme',
        'grade',
        'group',
        'image',
    ];  

    public function scopeTheme($query, $theme)
    {
        if($theme)
        return $query->where('theme', 'LIKE', "$theme");
    }

    public function scopeSemester($query, $semester)
    {
        if($semester)
        return $query->where('grade', 'LIKE', "$semester");
    }

    public function scopeTurn($query, $turn)
    {
        if($turn)
        return $query->where('turn', 'LIKE', "$turn");
    }

    public function scopeDate($query, $date)
    {
        if($date == 'nuevo')
        {
            return $query->orderBy('created_at', 'desc');
        } elseif($date == 'antiguo')
        {
            return $query->orderBy('created_at', 'asc');
        }
        
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments() 
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
