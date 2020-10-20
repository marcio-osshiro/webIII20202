<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    //
    function index() {
      $categorias = Categoria::all();
      return view("categoria.listagem")->with('categorias', $categorias);
    }
}
