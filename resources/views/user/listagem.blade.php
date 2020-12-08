@extends('layout.template')

@section('content')
  @if(session('mensagem'))
    <div class="alert {{ session('mensagem')['tipo'] }}">
      {{ session('mensagem')['descricao'] }}
    </div>
  @endif

  <h1>Usuário</h1>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">E-mail</th>
        <th scope="col" style="width:15rem"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($usuarios as $usuario)
        <tr>
          <th scope='row'>{{ $usuario['id'] }}</th>
          <th scope='row'>{{ $usuario['nome'] }}</th>
          <th scope='row'>{{ $usuario['email'] }}</th>
          <td>
            <a class='btn btn-success' href='usuario/{{$usuario['id']}}/aviso'>Aviso</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
