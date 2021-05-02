<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;

    protected $fillable = ['seguido', 'seguidor'];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function datos($id, $n){
        $foll = Follower::get()->where('id', $id)->take(1);
        foreach($foll as $f){
            $foll = $f;
        }
        if($n == 1){
            $n = 'seguido';
        }else{
            $n = 'seguidor';
        }
        $userSeguido = User::get()->where('id', $foll->$n)->take(1);
        foreach($userSeguido as $u){
            $userSeguido = $u;
        }
        return $userSeguido;
    }
}
