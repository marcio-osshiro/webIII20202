@extends('layout.template')

@section('content')
  @if(session('mensagem'))
    <div class="alert {{ session('mensagem')['tipo'] }}">
      {{ session('mensagem')['descricao'] }}
    </div>
  @endif

  <h1>Venda</h1>
  <a class="btn btn-primary" href="/venda/novo">Novo</a>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Documento</th>
        <th scope="col">Data</th>
        <th scope="col">Total</th>
        <th scope="col" style="width:15rem"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($vendas as $venda)
        <tr>
          <th scope='row'>{{ $venda['id'] }}</th>
          <td>{{ $venda['documento'] }}</td>
          <td>{{ $venda['data']->format('d/m/Y') }}</td>
          <td>R$ {{ number_format($venda['total'], 2, ',', '') }} </td>
          <td>
            <a class='btn btn-success' href='/venda/editar/{{$venda['id']}}'>Editar</a>
            <a class='btn btn-danger' href='/venda/excluir/{{$venda['id']}}'>Excluir</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
