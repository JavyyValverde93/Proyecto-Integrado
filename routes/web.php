<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('productos.index');
});

Route::get('/dashboard', function () {
    return redirect()->route('productos.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

use App\Http\Controllers\{GuardadoController, ProductoController, ComentarioController, PreguntaController, UserController, RespuestaController, FollowerController, MailController};

Route::resource("productos", ProductoController::class);
Route::resource("guardados", GuardadoController::class)->middleware(['auth']);
Route::resource("comentarios", ComentarioController::class)->middleware(['auth']);
Route::resource("preguntas", PreguntaController::class)->middleware(['auth']);
Route::resource("respuestas", RespuestaController::class)->middleware(['auth']);
Route::resource('followers', FollowerController::class)->middleware(['auth']);


Route::get("productos/create", [ProductoController::class, 'create'])
->name('productos.create')->middleware(['auth']);
Route::get("productos/edit/{producto}", [ProductoController::class, 'edit'])
->name('productos.edit')->middleware(['auth']);
Route::get("productos/{producto_id}/destroyprod", [ProductoController::class, 'destroyprod'])
->name('productos.destroyprod')->middleware(['auth']);

// Añadir y eliminar producto de favoritos
Route::get("guardados/{user_id}/guardar", [GuardadoController::class, 'guardar'])->name('guardar');
Route::get("guardados/{user_id}/quitar", [GuardadoController::class, 'quitar'])->name('quitar');

/////////////////////////Usuarios///////////////////////////
//Ver perfil
Route::get("users/{user_id}/ver_perfil", [UserController::class, 'ver_perfil'])
->name('ver_perfil');
//Menú admin
Route::get("users/admin_zone", [UserController::class, 'admin_zone'])
->name('admin_zone')->middleware(['auth']);
//Vista modificar usuario
Route::get("users/{user_id}/mod_user", [UserController::class, 'mod_user'])
->name('mod_user')->middleware(['auth', 'password.confirm']);
//Modificar usuario
Route::put("users/modify_user{user}", [UserController::class, 'modify_user'])
->name('modify_user') ->middleware(['auth']);
//Eliminar usuario
Route::get("users/{user_id}/destroy_user", [UserController::class, 'destroy_user'])
->name('destroy_user')->middleware(['auth', 'password.confirm', 'verified']);
//Hacer usuario admin
Route::get("users/{user_id}/do_admin", [UserController::class, 'do_admin'])
->name('do_admin')->middleware(['auth', 'password.confirm']);
//Hacer usuario normal
Route::get("users/{user_id}/undo_admin", [UserController::class, 'undo_admin'])
->name('undo_admin')->middleware(['auth', 'password.confirm']);

//Modals-data
Route::get("users/{user_id}/modals_data", [UserController::class, 'modals_data'])
->name('modals_data');

//Correos
Route::get('emails1/', function(){
    return view('emails.form');
});

Route::post('/contacto', [MailController::class, 'store'])->name('contacto')->middleware(['auth', 'verified']);
