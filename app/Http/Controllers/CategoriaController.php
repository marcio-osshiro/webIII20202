<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    function __construct() {
      $this->middleware('auth');
    }

    function index() {
      $categorias = Categoria::all();
      return view("categoria.listagem", compact('categorias'));
    }

    function novo() {
      $categoria = new Categoria();
      $categoria->id = 0;
      $categoria->descricao = "";
      return view("categoria.formulario", compact('categoria'));
    }

    function editar($id) {
      $categoria = Categoria::find($id);
      return view("categoria.formulario", compact('categoria'));
    }

    function salvar(Request $request) {
      if ($request->input("id")==0) {
        $categoria = new Categoria();
      } else {
        $categoria = Categoria::find($request->input("id"));
      }
      $categoria->descricao = $request->input("descricao");
      $categoria->save();
      return redirect()->route("categoria_lista");
    }

    function excluir($id) {
      $categoria = Categoria::find($id);
      $categoria->delete();
      return redirect()->route("categoria_lista");
    }
}
