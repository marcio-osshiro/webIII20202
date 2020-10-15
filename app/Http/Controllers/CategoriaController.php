<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //
    function index() {
      $fulano = "Usuário";
      return view("categoria")->with('fulano', $fulano);
    }

    function edit() {
      echo "Editando categoria";
    }
}
