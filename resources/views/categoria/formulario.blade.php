@extends('layout.template')

@section('content')
  <form action="{{ route('categoria_salvar') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="id">ID</label>
      <input readonly type="text" class="form-control" id="id" name="id" value="{{ $categoria['id'] }}" >
    </div>
    <div class="form-group">
      <label for="descricao">Descrição</label>
      <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $categoria['descricao'] }}">
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
@endsection
