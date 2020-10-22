<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
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

Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria_lista');
Route::get('/categoria/novo', [CategoriaController::class, 'novo']);
Route::get('/categoria/editar/{id}', [CategoriaController::class, 'editar']);
Route::post('/categoria/salvar', [CategoriaController::class, 'salvar'])->name('categoria_salvar');;
Route::get('/categoria/excluir/{id}', [CategoriaController::class, 'excluir']);
