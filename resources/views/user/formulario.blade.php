@extends('layout.template')

@section('content')
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('usuario_enviar') }}" method="POST">
    @csrf
    <input readonly type="hidden" class="form-control" id="id" name="id" value="{{ $usuario['id'] }}" >
    <h1>{{$usuario->nome}} ({{$usuario->email}}) </h1>
    <div class="form-group">
      <label for="mensagem">Mensagem</label>
      <textarea class="form-control" id="mensagem" name="mensagem" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
@endsection
