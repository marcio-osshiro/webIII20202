<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class VendaController extends Controller
{
    //
    function novo() {
      $produtos = Produto::all();
      return view("venda.formulario", compact('produtos'));
    }
}
