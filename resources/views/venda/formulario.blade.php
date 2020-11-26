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
    <form class="container">
      <div class="form-group row">
        <div class="col-10">
          <label for="exampleFormControlSelect1">Produto</label>
          <select class="form-control" id="codigo_produto" name="codigo_produto">
            @foreach($produtos as $produto)
            <option value="{{$produto->id}}">{{$produto->descricao}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="qtde">Qtde:</label>
          <input type="number" class="form-control" id="qtde" value="1">
        </div>
        <div class="col-2 d-flex align-items-end">
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
              </tr>
            </thead>
            <tbody id="corpo">
            </tbody>
            <tfoot>
              <th colspan="5" id="total" class="text-right">Total Venda: R$ </th>
            </tfoot>
          </table>
        </div>
      </div>
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
      $btn_adiciona = $('#btn-adiciona');
      $btn_adiciona.click(function() {
        $codigo_produto = $('#codigo_produto');
        id = $codigo_produto.val();
        qtde = $('#qtde').val();
        produto = buscaProduto(id);
        linha = geraLinha(produto, qtde);
        $corpo = $('#corpo');
        $corpo.append(linha);
      });

      function buscaProduto(id) {
        for(i=0;i<produtos.length;i++) {
          if (id==produtos[i].id) {
            return produtos[i];
          }
        }
        return null;
      }

      function geraLinha(produto, qtde) {
          valorTotal = produto.valor_unitario.substr(3);
          console.log(valorTotal);
          return `
            <tr>
              <th scope="col">`+ produto.codigo_barra+`</th>
              <th scope="col">`+ produto.descricao+`</th>
              <th scope="col">`+ qtde +`</th>
              <th scope="col">`+produto.valor_unitario+`</th>
              <th scope="col">`+valorTotal+`</th>
            </tr>
            `;
      }
    </script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>
