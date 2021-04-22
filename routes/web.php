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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

use App\Http\Controllers\{GuardadoController, ProductoController, ComentarioController, PreguntaController, UserController};

Route::resource("productos", ProductoController::class);
Route::resource("guardados", GuardadoController::class)->middleware(['auth']);
Route::resource("comentarios", ComentarioController::class)->middleware(['auth']);
Route::resource("preguntas", PreguntaController::class)->middleware(['auth']);

Route::get("guardados/{user_id}/guardar", [GuardadoController::class, 'guardar'])->name('guardar');
Route::get("guardados/{user_id}/quitar", [GuardadoController::class, 'quitar'])->name('quitar');
Route::get("users/{user_id}/ver_perfil", [UserController::class, 'ver_perfil'])->name('ver_perfil');
Route::get("productos/create", [ProductoController::class, 'create'])->name('productos.create')->middleware(['auth']);
