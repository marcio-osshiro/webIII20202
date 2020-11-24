<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Noticia;


class NewsController extends Controller
{
    function news() {
      $categorias = Categoria::all();
      $ultimasNoticias = Noticia::orderBy("data", "desc")
        ->take(3)->get();
      return view("news.index", compact('categorias', 'ultimasNoticias'));
    }
    function newsCategory($categoria_id, $noticia_id=0) {
      $categorias = Categoria::all();
      $noticiasCategoria = Noticia::where("categoria_id", $categoria_id)
        ->orderBy("data", "desc")
        ->paginate(3);
      if ($noticia_id!=0)  {
        $noticia = Noticia::find($noticia_id);
      } else {
        $noticia = $noticiasCategoria[0];
      }
      return view("news.categoria",
        compact("noticiasCategoria", "noticia", "categorias"));
    }
}
