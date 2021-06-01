<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;

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

Route::get('/', [UsuariosController::class, 'index']);
Route::get('/novo', [UsuariosController::class, 'create']);
Route::post('/novo', [UsuariosController::class, 'store'])->name('registrar');
Route::get('/usuario/{id}', [UsuariosController::class, 'show']);
Route::get('/editar/{id}', [UsuariosController::class, 'edit']);
Route::post('/editar/{id}', [UsuariosController::class, 'update'])->name('editar');
Route::get('/excluir/{id}', [UsuariosController::class, 'delete']);
Route::post('/excluir/{id}', [UsuariosController::class, 'destroy'])->name('excluir');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
