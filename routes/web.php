<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Post\PostController;

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
    return view('index');
});

Route::get('/admin', function(){
    return redirect('/admin/dashboard');
});
Route::group(['middleware' => 'auth','prefix' => 'admin'], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::post('/posts/status', [PostController::class, 'changeStatus'])->name('status');
    Route::post('/posts/destak', [PostController::class, 'changeDestak'])->name('destak');
    Route::get('/posts/novo', [PostController::class, 'create'])->name('novo');
    Route::post('/posts/novo', [PostController::class, 'store'])->name('salvar');
    Route::get('/post/editar/{id}', [PostController::class, 'edit'])->name('detalhes');
    Route::post('/post/editar/{id}', [PostController::class, 'update'])->name('editar');
    Route::post('/post/excluir/{id}', [PostController::class, 'destroy'])->name('excluir');
    Route::post('/post/imgupload', [PostController::class, 'imgUpload'])->name('imgUpload');
});

require __DIR__ . '/auth.php';
