<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $fillable = ["pregunta", "respuesta", "producto_id"];

    public function Producto(){
        return $this->belongsTo(Producto::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }

}
