<?php

use App\Models\User;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', function(){
    $btn = '<form action="#" method="POST">
        @csrf
        @method("DELETE")
        <a href={{route("ver_perfil", $id)}} target="_blank"><i class="fas fa-eye"></i></a>
        <a href={{route("mod_user", $id)}} target="black"><i class="fas fa-edit"></i></a>
        <button type="submit" style="color:red"><i class="fas fa-trash"></i></button>
    </form>';
    return datatables()->eloquent(User::query())->addColumn('btn', $btn)->rawColumns(['btn'])->toJson();

});

Route::get('products', function(){
    $btn = '<form action={{route("destroy2", $id)}} method="POST">
        @csrf
        @method("DELETE")
        <a href={{route("productos.show", ["$id, u=%"])}} target="_blank"><i class="fas fa-eye"></i></a>
        <a href={{route("productos.edit", $id)}} target="black"><i class="fas fa-edit"></i></a>
        <button type="submit" style="color:red"><i class="fas fa-trash"></i></button>
    </form>';
    $name = '<a href={{route("ver_perfil", $user->id)}}>$user->nombre</a>';
    return datatables()->eloquent(Producto::query())->addColumn('btn', $btn)
    ->addColumn('name', 'p')->rawColumns(['btn', 'name'])->toJson();

});
