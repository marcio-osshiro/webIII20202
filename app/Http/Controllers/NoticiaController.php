<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Categoria;

class NoticiaController extends Controller
{
  function index() {
    $noticias = Noticia::all();
    return view("noticia.listagem", compact('noticias'));
  }

  function novo() {
    $noticia = new Noticia();
    $noticia->id = 0;
    $noticia->titulo = "";
    $noticia->descricao = "";
    $noticia->data = "";
    $noticia->cidade = "";
    $noticia->categoria_id = 0;

    $categorias = Categoria::all();
    return view("noticia.formulario", compact('noticia', 'categorias'));
  }

  function editar($id) {
    $noticia = Noticia::find($id);
    $categorias = Categoria::all();
    return view("noticia.formulario", compact('noticia', 'categorias'));
  }

  function salvar(Request $request) {
    if ($request->input("id")==0) {
      $noticia = new Noticia();
    } else {
      $noticia = Noticia::find($request->input("id"));
    }
    $noticia->titulo = $request->input("titulo");
    $noticia->descricao = $request->input("descricao");
    $noticia->data = $request->input("data");
    $noticia->cidade = $request->input("cidade");
    $noticia->categoria_id = $request->input("categoria_id");
    $categoria->save();
    return redirect()->route("noticia_lista");
  }

  function excluir($id) {
    $noticia = Noticia::find($id);
    $noticia->delete();
    return redirect()->route("noticia_lista");
  }

}
