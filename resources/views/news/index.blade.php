@extends("layout.templateNews")
<style media="screen">
  .carousel-caption {
    background-color: black;
    opacity: 60%;
  }
  .container {
    margin-top: 2rem;
    border: 1px solid gray;
    padding-bottom: 1rem;
  }
</style>
@section('content')
<h1 class="text-center">Últimas Notícias</h1>
<div id="ultimas-noticias" class="carousel slide w-50 m-auto" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#ultimas-noticias" data-slide-to="0" class="active"></li>
    <li data-target="#ultimas-noticias" data-slide-to="1"></li>
    <li data-target="#ultimas-noticias" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    @foreach($ultimasNoticias as $ultimaNoticia)
      <div class="carousel-item {{ $loop->first==1 ? 'active': ''}} ">
        <img src="/imagens/{{ $ultimaNoticia['imagem'] }}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>{{ $ultimaNoticia->titulo }}</h5>
          <p>{{$ultimaNoticia->categoria->descricao}} - {{ $ultimaNoticia->data->format('d/m/Y') }}</p>
        </div>
      </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#ultimas-noticias" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#ultimas-noticias" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@foreach($categorias as $categoria)
  <div class="container">
    <h1>{{$categoria->descricao}}</h1>
    <div class="row">
      @foreach($categoria->ultimasNoticias() as $ultimaNoticia)
      <div class="col-4">
        <div class="card">
          <img class="card-img-top" src="/imagens/{{ $ultimaNoticia['imagem'] }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{$ultimaNoticia->titulo}}</h5>
            <p class="card-text">{{$ultimaNoticia->data}}</p>
            <a href="#" class="btn btn-primary">mais...</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
@endforeach

@endsection
