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
}
