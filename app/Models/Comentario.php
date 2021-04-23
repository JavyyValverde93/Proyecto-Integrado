<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = ["comentario", "producto_id"];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Respuesta(){
        return $this->hasMany(Respuesta::class);
    }


}
