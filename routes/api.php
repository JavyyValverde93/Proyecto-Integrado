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
    $btn = '
        <a href={{route("ver_perfil", $id)}} target="_blank"><i class="fas fa-eye" title="Ver perfil de usuario"></i></a>
        <a href={{route("mod_user", $id)}} target="black"><i class="fas fa-user-edit" title="Editar usuario"></i></a>
        @if($tipo==0)
        <a href={{route("do_admin", $id)}} onclick="return confirm(`¿Está seguro de que quiere hacer admin este usuario ?`)"><i class="fas fa-user-crown" title="Añadir a administradores"></i></a>
        @else
        <a href={{route("undo_admin", $id)}} onclick="return confirm(`¿Está seguro de que quiere hacer normal este usuario ?`)"><i class="fas fa-user" title="Quitar privilegios de administrador"></i></a>
        @endif
        <a href={{route("destroy_user", $id)}} onclick="return confirm(`¿Está seguro de que quiere eliminar este usuario ?`)"><i class="fas fa-trash-alt" title="Eliminar usuario"></i></a>
        ';
    $foto = '<img src={{asset("$foto")}} width=50 height=50>';
    return datatables()->eloquent(User::query())->addColumn('btn', $btn)->addColumn('fot', $foto)->rawColumns(['btn', 'fot'])->toJson();

});

Route::get('products', function(){
    $btn = '
        <a href={{route("ver_perfil", $user_id)}} target="black"><i class="fas fa-user" title="Ver perfil del propietario"></i></a>
        <a href={{route("productos.show", ["$id?u=%"])}} target="black"><i class="fas fa-eye" title="Ver producto"></i></a>
        <a href={{route("productos.edit", $id)}} target="black"><i class="fas fa-edit" title="Modificar producto"></i></a>
        <a href={{route("productos.destroyprod", [$id, "ad=1"])}} onclick="return confirm(`¿Está seguro de que quiere eliminar este producto ?`)"><i class="fas fa-trash-alt" title="Eliminar producto"></i></a>
    ';
    $foto = '<img src={{asset("$foto1")}} width=50 height=50 class="mx-auto">';
    return datatables()->eloquent(Producto::query())->addColumn('btn', $btn)->addColumn('foto', $foto)
    ->rawColumns(['btn', 'foto'])->toJson();

});
