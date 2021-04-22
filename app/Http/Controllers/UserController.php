<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Producto;
use App\Models\Guardado;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function ver_perfil($user_id){
        $user = User::get()->where('id', "=", $user_id)->take(1);
        $productos = Producto::orderBy('id', 'desc')->where('user_id', "=", $user_id)->paginate(25);
        $n_prods = $productos->count();
        $guardados = Guardado::orderBy('id', 'desc')->where('user_id', "=", $user_id)->paginate(25);
        $n_guards = $guardados->count();
        return view('users.user-profile', compact('user', 'productos', 'n_prods', 'guardados', 'n_guards'));
    }
}
