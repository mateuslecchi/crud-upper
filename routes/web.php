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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios');
    Route::get('/novo', [UsuariosController::class, 'create'])->name('novo');
    Route::post('/novo', [UsuariosController::class, 'store'])->name('registrar');
    Route::get('/usuario/{id}', [UsuariosController::class, 'show']);
    Route::get('/editar/{id}', [UsuariosController::class, 'edit']);
    Route::post('/editar/{id}', [UsuariosController::class, 'update'])->name('editar');
    Route::get('/excluir/{id}', [UsuariosController::class, 'delete']);
    Route::post('/excluir/{id}', [UsuariosController::class, 'destroy'])->name('excluir');
});

require __DIR__ . '/auth.php';
