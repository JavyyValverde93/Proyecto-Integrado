<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Notifications\UserResetPassword;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'foto',
        'ciudad',
        'tipo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Comentario(){
        return $this->hasMany(Comentario::class);
    }

    public function Producto(){
        return $this->hasMany(Producto::class);
    }

    public function Guardado(){
        return $this->hasMany(Guardado::class);
    }

    public function Respuesta(){
        return $this->hasMany(Respuesta::class);
    }

    public function Follower(){
        return $this->hasMany(Follower::class);
    }

    //Notificiones
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPassword($token));
    }

}
