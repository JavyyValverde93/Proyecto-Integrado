<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    protected $fillable = ["respuesta", "comentario_id"];

    public function Comentario(){
        return $this->belongsTo(Comentario::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
