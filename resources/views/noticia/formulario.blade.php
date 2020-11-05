@extends('layout.template')

@section('content')
  <form action="{{ route('noticia_salvar') }}" method="POST" enctype="multipart/form-data">
    @csrf

    @if ($noticia['imagem'] != "")
      <img style="width: 20%;" src="/imagens/{{$noticia['imagem']}}">
    @endif
    <input type="hidden" name="imagem" value="{{$noticia['imagem']}}">

    <div class="form-group">
      <label for="id">ID</label>
      <input readonly type="text" class="form-control" id="id" name="id" value="{{ $noticia['id'] }}" >
    </div>
    <div class="form-group">
      <label for="arquivo_imagem">Imagem</label>
      <input type="file" class="form-control" id="arquivo_imagem" name="arquivo_imagem">
    </div>
    <div class="form-group">
      <label for="titulo">Titulo</label>
      <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $noticia['titulo'] }}">
    </div>
    <div class="form-group">
      <label for="descricao">Descrição</label>
      <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $noticia['descricao'] }}">
    </div>
    <div class="form-group">
      <label for="data">Data</label>
      <input type="date" class="form-control" id="data" name="data" value="{{ $noticia['data'] }}">
    </div>
    <div class="form-group">
      <label for="cidade">Cidade</label>
      <input type="text" class="form-control" id="cidade" name="cidade" value="{{ $noticia['cidade'] }}">
    </div>
    <div class="form-group">
        <label for="categoria_id">Categoria</label>
        <select class="form-control" id="categoria_id" name="categoria_id">
          @foreach ($categorias as $categoria)
            <option {{ $noticia->categoria_id == $categoria->id?"selected":""}} value="{{ $categoria['id'] }}">{{ $categoria['descricao'] }}</option>
          @endforeach

        </select>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
@endsection
