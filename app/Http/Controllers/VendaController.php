<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Venda;
use App\Models\Item;

class VendaController extends Controller
{
    //
    function lista() {
      $vendas = Venda::all();
      return view("venda.listagem", compact('vendas'));
    }

    function novo() {
      $produtos = Produto::all();
      $venda = new Venda();
      $venda->id = 0;
      $venda->data = now();
      $venda->total = 0.00;
      return view("venda.formulario", compact('produtos', 'venda'));
    }

    function salvar(Request $request) {
      if ($request->input("id")==0) {
        $venda = new Venda();
      } else {
        DB::table('item')->where('venda_id', $request->input('id'))->delete();
        $venda = Venda::find($request->input("id"));
      }
      $venda->documento = $request->input("documento");
      $venda->data = $request->input("data");

      $codigo_barra = $request->input("codigo_barra");
      $qtde = $request->input("qtde");
      $valor_unitario = $request->input("valor_unitario");

      $itens = array();
      $venda->total = 0;
      for($i=0;$i<count($codigo_barra);$i++) {
        $produto = Produto::firstWhere("codigo_barra",
                                        $codigo_barra[$i]);

        $item = new Item();
        $item->produto_id = $produto->id;
        $item->qtde = $qtde[$i];
        $item->valor_unitario = $produto->valor_unitario;
        $itens[] = $item;
        $venda->total = $venda->total + $item->valor_total();
      }
      $venda->save();
      if (count($codigo_barra)>0) {
        $venda->itens()->saveMany($itens);
      }
      return redirect()->route("venda_lista");
    }

    function excluir($id) {
      $venda = Venda::find($id);
      $venda->delete();
      return redirect()->route("venda_lista");
    }

    function editar($id) {
      $venda = Venda::find($id);
      $vendas = Venda::all();
      $produtos = Produto::all();
      return view("venda.formulario", compact('venda', 'produtos'));
    }
}
