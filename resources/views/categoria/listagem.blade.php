@extends('layout.template')

@section('content')
  <h1>Categoria</h1>
  <a class="btn btn-primary" href="categoria/novo">Novo</a>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Descrição</th>
        <th scope="col" style="width:15rem"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categorias as $categoria)
        <tr>
          <th scope='row'>{{ $categoria['id'] }}</th>
          <td>{{ $categoria['descricao'] }}</td>
          <td>
            <a class='btn btn-success' href='categoria/editar/{{$categoria['id']}}'>Editar</a>
            <a class='btn btn-danger' href='categoria/excluir/{{$categoria['id']}}'>Excluir</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
