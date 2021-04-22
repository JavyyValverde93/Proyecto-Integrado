<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;


class Picture extends Model
{
    use HasFactory;

    protected $fillable = ["foto", "posicion"];

    public function Producto(){
        return $this->belongsTo(Producto::class);
    }
}
