<?php

namespace App\Models;

use App\Models\Hash;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'code',
        'semester',
        'no_control',
        'group',
        'carrer',
        'turn',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = Hash::make($password);
    // }

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function homework()
    {
        return $this->hasMany(Homework::class);
    }

    public function homeworks_send()
    {
        return $this->hasMany(Homework_send::class);
    }
    // public function chat()
    // {
    //     return $this->hasMany(Chat::class);
    // }
}
