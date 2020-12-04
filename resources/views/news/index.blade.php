@extends("layout.templateNews")
<style media="screen">
  .carousel-caption {
    background-color: black;
    opacity: 60%;
  }
  .container {
    /* border: 1px solid gray; */
  }
  .container1 {
    border: 1px solid lightgray;
    margin-bottom: 3rem;
    padding-bottom: 1rem;
    border-radius: 20px;
  }
  /* .embed-responsive-item {
    object-fit: cover;
  } */
</style>
@section('content')
<div class="container container1">
  <h1 class="text-center">Últimas Notícias</h1>
  <div id="ultimas-noticias" class="carousel slide w-100 m-auto" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#ultimas-noticias" data-slide-to="0" class="active"></li>
      <li data-target="#ultimas-noticias" data-slide-to="1"></li>
      <li data-target="#ultimas-noticias" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      @foreach($ultimasNoticias as $ultimaNoticia)
        <div class="carousel-item {{ $loop->first==1 ? 'active': ''}} ">
          <div class="embed-responsive embed-responsive-21by9">
            <img src="/imagens/{{ $ultimaNoticia['imagem'] }}" class="embed-responsive-item" alt="...">
          </div>
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
</div>
@foreach($categorias as $categoria)
  <div class="container container1">
    <h1>{{$categoria->descricao}}</h1>
    <div class="row">
      @foreach($categoria->ultimasNoticias() as $ultimaNoticia)
      <div class="col-4">
        <a href="{{route('newsCategory', [$ultimaNoticia->categoria->id, $ultimaNoticia->id])}}" class="card">
          <img class="card-img-top" src="/imagens/{{ $ultimaNoticia['imagem'] }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{$ultimaNoticia->titulo}}</h5>
            <p class="card-text">{{$ultimaNoticia->data->format('d/m/Y')}}</p>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
@endforeach

@endsection
