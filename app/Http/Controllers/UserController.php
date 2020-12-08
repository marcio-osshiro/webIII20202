<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserMessage;

class UserController extends Controller
{
    //
    function lista() {
      $usuarios = User::all();
      return view("user.listagem", compact('usuarios'));
    }

    function avisa($id) {
      $usuario = User::find($id);
      return view("user.formulario", compact("usuario"));
    }

    function envia(Request $request) {
      $id = $request->input("id");
      $mensagem = $request->input("mensagem");
      $usuario = User::find($id);
      Mail::to($usuario->email)->send(new UserMessage($mensagem, $usuario));
      return redirect()->route("usuario_lista");
    }
}
