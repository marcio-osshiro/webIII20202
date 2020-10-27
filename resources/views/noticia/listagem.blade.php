<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style media="screen">
      body {
        padding: 2rem;
      }
    </style>

    <title>Noticia</title>
  </head>
  <body>
    <h1>Noticia</h1>
    <a class="btn btn-primary" href="noticia/novo">Novo</a>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Título</th>
          <th scope="col">Descrição</th>
          <th scope="col">Data</th>
          <th scope="col">Cidade</th>
          <th scope="col">Categoria</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($noticias as $noticia)
          <tr>
            <th scope='row'>{{ $noticia['id'] }}</th>
            <td>{{ $noticia['titulo'] }}</td>
            <td>{{ $noticia['descricao'] }}</td>
            <td>{{ $noticia['data'] }}</td>
            <td>{{ $noticia['cidade'] }}</td>
            <td>{{ $noticia['categoria']->descricao }}</td>
            <td>
              <a class='btn btn-success' href='noticia/editar/{{$noticia['id']}}'>Editar</a>
              <a class='btn btn-danger' href='noticia/excluir/{{$noticia['id']}}'>Excluir</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>