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

//Followers
Route::post('follower/store', [FollowerController::class, 'store'])->name('followers.store')->middleware('auth');
Route::post('follower/destroy/{follower}', [FollowerController::class, 'destroy'])->name('followers.destroy')->middleware('auth');
//Comentarios
Route::resource("comentarios", ComentarioController::class)->middleware(['auth']);
Route::post('comentario/store', [ComentarioController::class, 'store'])->name('comentarios.store')->middleware('auth');
Route::post('comentario/destroy/{comentario}', [ComentarioController::class, 'destroy'])->name('comentarios.destroy')->middleware('auth');
//Repuestas
Route::resource("respuestas", RespuestaController::class)->middleware(['auth']);
Route::post('respuesta/destroy/{respuesta}', [RespuestaController::class, 'destroy'])->name('respuestas.destroy')->middleware('auth');

Route::post('guardado/destroy/{guardado}', [GuardadoController::class, 'destroy'])->name('guardados.destroy')->middleware('auth');

//Productos
Route::resource("productos", ProductoController::class);
Route::get("productos/create", [ProductoController::class, 'create'])
->name('productos.create')->middleware(['auth']);
Route::get("productos/edit/{producto}", [ProductoController::class, 'edit'])
->name('productos.edit')->middleware(['auth']);
Route::get("productos/{producto_id}/destroyprod", [ProductoController::class, 'destroyprod'])
->name('productos.destroyprod')->middleware(['auth']);

//Preguntas
Route::resource("preguntas", PreguntaController::class)->middleware(['auth']);
Route::post("preguntas/{pregunta}", [PreguntaController::class, 'update'])->middleware(['auth'])->name('preguntas.update');
Route::post("preguntas/destroy/{pregunta}", [PreguntaController::class, 'destroy'])->middleware(['auth'])->name('preguntas.destroy');

// Añadir y eliminar producto de favoritos
Route::get("guardados/{user_id}/guardar", [GuardadoController::class, 'guardar'])->name('guardar');
Route::get("guardados/{user_id}/quitar", [GuardadoController::class, 'quitar'])->name('quitar');

/////////////////////////Usuarios///////////////////////////
//Ver perfil
Route::get("users/{user_id}/ver_perfil", [UserController::class, 'ver_perfil'])
->name('ver_perfil');
//Menú admin
Route::get("users/admin_zone", [UserController::class, 'admin_zone'])
->name('admin_zone')->middleware(['auth', 'admin', 'password.confirm']);
//Vista modificar usuario
Route::get("users/{user_id}/mod_user", [UserController::class, 'mod_user'])
->name('mod_user')->middleware(['auth', 'password.confirm']);
//Modificar usuario
Route::put("users/modify_user{user}", [UserController::class, 'modify_user'])
->name('modify_user') ->middleware(['auth']);
//Eliminar usuario
Route::get("users/{user_id}/destroy_user", [UserController::class, 'destroy_user'])
->name('destroy_user')->middleware(['auth', 'password.confirm']);
//Hacer usuario admin
Route::get("users/{user_id}/do_admin", [UserController::class, 'do_admin'])
->name('do_admin')->middleware(['auth', 'password.confirm', 'admin']);
//Hacer usuario normal
Route::get("users/{user_id}/undo_admin", [UserController::class, 'undo_admin'])
->name('undo_admin')->middleware(['auth', 'password.confirm', 'admin']);
//Password_reset
Route::get("password_reset", [UserController::class, 'reset_password'])->name('users.password_reset')->middleware(['auth', 'password.confirm']);
Route::post("changing_passsword", [UserController::class, 'change_password'])->name('users.change_password')->middleware(['auth', 'password.confirm']);

//Modals-data
Route::get("users/{user_id}/modals_data", [UserController::class, 'modals_data'])
->name('modals_data');

//Correos
Route::get('emails1/', function(){
    return view('emails.form');
});

Route::post('/contacto', [MailController::class, 'store'])->name('contacto')->middleware(['auth', 'verified']);
Route::post('/sugerencias', [MailController::class, 'sugerencia'])->name('sugerencia');
