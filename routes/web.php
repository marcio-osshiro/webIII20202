<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\IndexController;

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
Route::get('/', [IndexController::class, 'index'])->name('inicio');


Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria_lista');
Route::get('/categoria/novo', [CategoriaController::class, 'novo']);
Route::get('/categoria/editar/{id}', [CategoriaController::class, 'editar']);
Route::post('/categoria/salvar', [CategoriaController::class, 'salvar'])->name('categoria_salvar');;
Route::get('/categoria/excluir/{id}', [CategoriaController::class, 'excluir']);


Route::get('/noticia', [NoticiaController::class, 'index'])->name('noticia_lista');
Route::get('/noticia/novo', [NoticiaController::class, 'novo']);
Route::get('/noticia/editar/{id}', [NoticiaController::class, 'editar']);
Route::post('/noticia/salvar', [NoticiaController::class, 'salvar'])->name('noticia_salvar');;
Route::get('/noticia/excluir/{id}', [NoticiaController::class, 'excluir']);
