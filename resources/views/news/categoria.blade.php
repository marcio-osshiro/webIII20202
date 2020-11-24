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
  .embed-responsive-21by9::before {
    padding-top: 10%;
  }
  .card-img-top>img {
    object-fit: cover;
  }

</style>
@section('content')
  <h1>{{ $noticia->categoria->descricao }}</h1>
  <div class="card mb-3">
    <h2 class="text-center card-title">{{ $noticia['titulo']}}</h2>
    <div class="m-auto card-img-top embed-responsive embed-responsive-21by9 w-75">
      <img class="embed-responsive-item" src="/imagens/{{ $noticia['imagem'] }}" alt="Card image cap">
    </div>
    <div class="card-body">
      <p class="card-text">{{ $noticia['descricao']}}</p>
      <p class="card-text text-right"><small class="text-muted">{{ $noticia['data']->format('d/m/Y')}} ({{ $noticia->cidade }})</small></p>
    </div>
  </div>
  @foreach($noticiasCategoria as $noticiaCategoria)
  @if($noticiaCategoria->id != $noticia->id)
  <a href="{{route('newsCategory', [$noticiaCategoria->categoria->id, $noticiaCategoria->id])}}" class='card mb-3'>
    <div class="row no-gutters">
      <div class="col-md-2">
        <img src="/imagens/{{$noticiaCategoria['imagem']}}" class="card-img" alt="...">
      </div>
      <div class="col-md-10">
        <div class="card-body">
          <h5 class="card-title">{{ $noticiaCategoria->titulo }}</h5>
          <p class="card-text">{{ Str::limit($noticiaCategoria->descricao, 20, '...') }}</p>
          <p class="card-text text-right"><small class="text-muted">{{$noticiaCategoria->data->format('d/m/Y')}}({{$noticiaCategoria->cidade}})</small></p>
        </div>
      </div>
    </div>
  </a>
  @endif
  @endforeach
  {{ $noticiasCategoria->links() }}
@endsection
