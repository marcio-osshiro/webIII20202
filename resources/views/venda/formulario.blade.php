<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Venda</h1>
    <form class="container-fluid" action="{{route('venda_salvar')}}" method="POST">
      @csrf
      <div class="row">
        <div class="form-group col">
          <label for="id">ID:</label>
          <input type="text" readonly class="form-control" id="id" value="{{$venda->id}}" name="id">
        </div>
        <div class="form-group col">
          <label for="documento">Documento:</label>
          <input type="text" class="form-control" id="documento" value="{{$venda->documento}}" name="documento">
        </div>
        <div class="form-group col">
          <label for="data">Data:</label>
          <input type="date" class="form-control" id="data" value="{{$venda->data->format('Y-m-d')}}" name="data">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-8">
          <label for="exampleFormControlSelect1">Produto</label>
          <select class="form-control" id="codigo_produto" name="codigo_produto">
            @foreach($produtos as $produto)
            <option value="{{$produto->id}}">{{$produto->descricao}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-2 form-group">
          <label for="qtde">Qtde:</label>
          <input type="number" class="form-control" id="qtde" value="1">
        </div>
        <div class="col-2 d-flex align-items-center">
          <button class="btn btn-primary" type="button" name="button" id="btn-adiciona">Adiciona</button>
        </div>

        <div class="container m-4">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">Cod. Barra</th>
                <th scope="col">Descrição</th>
                <th scope="col">Qtde.</th>
                <th scope="col">Vr.Unitário</th>
                <th scope="col">Vr.Total</th>
                <th></th>
              </tr>
            </thead>
            <tbody id="corpo">
              @foreach($venda->itens as $item)
              <tr>
                <th scope="col"><input type="text" readonly name="codigo_barra[]" value="{{$item->produto->codigo_barra}}"></th>
                <th scope="col"><input type="text" readonly name="descricao[]" value="{{$item->produto->descricao}}"></th>
                <th scope="col"><input type="text" readonly name="qtde[]" value="{{$item->qtde}}"></th>
                <th scope="col"><input type="text" readonly name="valor_unitario[]" value="R$ {{number_format($item->valor_unitario, 2, ',', '')}}"></th>
                <th scope="col"><input type="text" readonly name="valor_total[]" value="R$ {{number_format($item->valor_total(), 2, ',', '')}}"></th>
                <th><button type="button" class="btn btn-danger btn-excluir-item">-</button></th>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <th colspan="6" id="total" class="text-right">Total Venda: R$ {{ number_format($venda->total, 2, ',', '') }}</th>
            </tfoot>
          </table>
        </div>
      </div>
      <button class="btn btn-primary" type="submit" name="button">Gravar</button>
      <!-- <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div> -->
    </form>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript">
      var produtos = {!! $produtos !!};
      var totalVenda = {{ $venda->total }};
      $btn_adiciona = $('#btn-adiciona');

      $btn_adiciona.click(function() {
        $codigo_produto = $('#codigo_produto');
        id = $codigo_produto.val();
        qtde = $('#qtde').val();
        produto = buscaProduto(id);
        totalVenda = totalVenda + calculaValorTotal(produto, qtde);
        linha = geraLinha(produto, qtde);
        $corpo = $('#corpo');
        $corpo.append(linha);

        mostraValorTotal();

        $btn_excluir_item = $('.btn-excluir-item');
        $btn_excluir_item.click(btnExcluir);
      });

      function mostraValorTotal() {
        $total = $('#total');
        $total.html('Total Venda: '+ ValueToString(totalVenda));
      }

      function buscaProduto(id) {
        for(i=0;i<produtos.length;i++) {
          if (id==produtos[i].id) {
            return produtos[i];
          }
        }
        return null;
      }

      function buscaProdutoCodigoBarra(codigo) {
        for(i=0;i<produtos.length;i++) {
          if (codigo==produtos[i].codigo_barra) {
            return produtos[i];
          }
        }
        return null;
      }

      function btnExcluir() {
        $elemento = $(event.target);
        $linha = $elemento.parents("tr");
        codigoBarra = $linha.find(':nth-child(1)').find('input').val();
        produto = buscaProdutoCodigoBarra(codigoBarra);
        qtde = 0 + $linha.find(':nth-child(3)').find('input').val();
        valorTotal = qtde * StringToValue(produto.valor_unitario);
        totalVenda = totalVenda - valorTotal;
        mostraValorTotal();
        $linha.remove();
        preventDefault();
      }

      function calculaValorTotal(produto, qtde) {
        //return StringToValue(produto.valor_unitario)*qtde;
        return produto.valor_unitario * qtde;
      }
      function geraLinha(produto, qtde) {
          //valorTotal = StringToValue(produto.valor_unitario)*qtde;
          valorTotal = produto.valor_unitario*qtde;
          return `
            <tr>
              <th scope="col"><input type="text" readonly name="codigo_barra[]" value="`+ produto.codigo_barra+`"></th>
              <th scope="col"><input type="text" readonly name="descricao[]" value="`+ produto.descricao+`"></th>
              <th scope="col"><input type="text" readonly name="qtde[]" value="`+ qtde +`"></th>
              <th scope="col"><input type="text" readonly name="valor_unitario[]" value="`+ValueToString(parseFloat(produto.valor_unitario))+`"></th>
              <th scope="col"><input type="text" readonly name="valor_total[]" value="`+ValueToString(valorTotal)+`"></th>
              <th><button type="button" class="btn btn-danger btn-excluir-item">-</button></th>
            </tr>
            `;
      }

      function StringToValue(dinheiro) {
        return 0.00 + dinheiro.substr(3).replace(',', '.');
      }

      function ValueToString(dinheiro) {
        return dinheiro.toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'});
      }
    </script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>
