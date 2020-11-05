@extends('layout.template')

@section('content')
  <h1>Noticia</h1>
  <a class="btn btn-primary" href="noticia/novo">Novo</a>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Imagem</th>
        <th scope="col">Título</th>
        <th scope="col">Descrição</th>
        <th scope="col">Data</th>
        <th scope="col">Cidade</th>
        <th scope="col">Categoria</th>
        <th scope="col" style="width:11rem"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($noticias as $noticia)
        <tr>
          <th scope='row'>{{ $noticia['id'] }}</th>
          <td>
            @if($noticia['imagem'] != "")
              <img style="width: 100px;" src="/imagens/{{ $noticia['imagem'] }}">
            @endif
          </td>
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
@endsection
