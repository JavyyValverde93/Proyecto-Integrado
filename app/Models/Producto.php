<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Picture;

use Illuminate\Support\Facades\DB;


class Producto extends Model
{
    use HasFactory;

    protected $fillable = ["nombre", "categoria", "descripcion", "precio", "guardados", "visualizaciones", 'foto1', 'foto2', 'foto3', 'foto4', 'foto5', "user_id"];

    public function Picture(){
        return $this->hasMany(Picture::class);
    }

    public function Guardado(){
        return $this->hasMany(Guardado::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function scopeNombre($query, $p){
        if($p!=null){
            // \DB es igual a poner use Illuminate\Support\Facades\DB; y DB
            return $query->where(DB::raw("CONCAT(nombre, ' ', descripcion)"), "LIKE", "%$p%");
        }else{
            return $query->where('nombre', "LIKE", "%");
        }
    }

}
