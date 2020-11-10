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
      <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo" value="{{ old('titulo', $noticia['titulo']) }}">
      @error('titulo')
        <div class="alert alert-danger">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="form-group">
      <label for="descricao">Descrição</label>
      <input type="text" class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" value="{{ old('descricao', $noticia['descricao']) }}">
      @error('descricao')
        <div class="alert alert-danger">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="form-group">
      <label for="data">Data</label>
      <input type="date" class="form-control  @error('data') is-invalid @enderror" id="data" name="data" value="{{old('data', $noticia['data']->format('Y-m-d')) }}">
      @error('data')
        <div class="alert alert-danger">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="form-group">
      <label for="cidade">Cidade</label>
      <input type="text" class="form-control  @error('cidade') is-invalid @enderror" id="cidade" name="cidade" value="{{ old('cidade', $noticia['cidade']) }}">
      @error('cidade')
        <div class="alert alert-danger">
          {{ $message }}
        </div>
      @enderror

    </div>
    <div class="form-group">
        <label for="categoria_id">Categoria</label>
        <select class="form-control  @error('categoria_id') is-invalid @enderror" id="categoria_id" name="categoria_id">
          @foreach ($categorias as $categoria)
            <option {{ $noticia->categoria_id == $categoria->id?"selected":""}} value="{{ $categoria['id'] }}">{{ $categoria['descricao'] }}</option>
          @endforeach
        </select>
        @error('categoria_id')
          <div class="alert alert-danger">
            {{ $message }}
          </div>
        @enderror

    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
@endsection
