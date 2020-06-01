@extends('layouts.app')
@section('titulo', 'Principais Notícias')
@section('content')
     <div class="container">

     @if (count($registros) < 1)
          <p>Ops, ainda não temos nenhum evento</p>
     @else
          <div id="myCarousel" class="carousel slide mb-4" data-ride="carousel">
               <ol class="carousel-indicators">
                    @for($i = 0; $i < ( count($registros) < 3 ? count($registros) : 3); $i++)
                         <li data-target="#myCarousel" data-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : ''}}"></li>
                    @endfor
               </ol>
               <div class="carousel-inner">

                    @for($i = 0; $i < ( count($registros) < 3 ? count($registros) : 3); $i++)
                         <div class="carousel-item {{$i == 0 ? 'active' : '' }}" data-interval="5000">
                              <img src="{{ asset($registros[$i]->anexo) }}" class="d-block w-100" alt="Imagem do banner de postagens">
                              <a class="carousel-caption" href="{{ route('site.noticias.vizualizar', $registros[$i]->slug) }}">
                                   <h2>{{ $registros[$i]->titulo}}</h2>
                              </a>
                         </div>
                    @endfor

               </div>
               <a style="z-index: 11;" class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
                    <span class="fas fa-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
               </a>
               <a style="z-index: 11;" class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="fas fa-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
               </a>
          </div>        
     @endif

     @if(isset($noticias)  && count($noticias) != 0)
     <div class="mb-5">
          <h2 class="mb-3">Últimas noticias</h2>
          <div class="d-flex flex-wrap justify-content-center">
          
               @foreach ($noticias as $noticia)
                    <div class="col-10 col-md-5 col-lg-3 mb-2">
                         <div class="card home">
                              <div class="card-header">
                                   <img src="{{ asset($noticia->anexo ?? '/img/lapa-logo.png') }}" alt="{{ $noticia->titulo }}">
                              </div>
                              <div class="card-body">
                                   <h5>
                                        <a href="{{ route('site.noticias.vizualizar', $noticia->slug) }}">
                                             {{$noticia->titulo}} 
                                             </a>
                                   </h5>
                                   {!! strip_tags($noticia->descricao) !!}
                              </div>
                              <div class="card-footer">
                                   Publicado {{ date('d/m/Y', strtotime($noticia->created_at)) }} às {{ date('H:i', strtotime($noticia->created_at)) }}
                              </div>
                         </div>
                    </div>
               @endforeach
              
          </div>
          <a href="{{ route('site.postagens.indexNoticia') }}" class="btn">Ver todas</a>
     </div>
     @endif

     @if(isset($eventos) && count($eventos) != 0)
     <div class="mb-5">
          <h2 class="mb-3">Próximos eventos</h2>
          <div class="d-flex flex-wrap justify-content-center">
          
          @foreach ($eventos as $evento)
              <div class="col-10 col-md-5 col-lg-3 mb-2">
                   <div class="card home">
                         <div class="card-header">
                              <img src="{{ asset($evento->anexo ?? '/img/lapa-logo.png') }}" alt="{{ $evento->titulo }}">
                         </div>
                         <div class="card-body">
                              <h5>
                                   <a href="{{ route('site.noticias.vizualizar', $evento->slug) }}">
                                        {{$evento->titulo}} 
                                    </a>
                              </h5>
                              {!! strip_tags($evento->descricao) !!}
                         </div>
                         <div class="card-footer">
                              <span class="fas fa-calendar-alt"></span>
                              Data do evento: {{ date('d/m/Y', strtotime($evento->data)) }} às {{ date('H:i', strtotime($evento->hora)) }}
                         </div>
                         <div class="card-footer">
                              Publicado {{ date('d/m/Y', strtotime($evento->created_at)) }} às {{ date('H:i', strtotime($evento->created_at)) }}
                         </div>
                   </div>
              </div>
          </div>
          @endforeach
          <a href="{{ route('site.postagens.indexEvento') }}" class="btn">Ver todos</a>
     </div>
     @endif

     @if(isset($editais) && count($editais) != 0)
     <div class="mb-5">
          <h2 class="mb-3">Próximos eventos</h2>
          <div class="d-flex flex-wrap justify-content-center">
          
          @foreach ($editais as $edital)
              <div class="col-10 col-md-5 col-lg-3 mb-2">
                   <div class="card home">
                         <div class="card-header">
                              <img src="{{ asset($edital->anexo ?? '/img/lapa-logo.png') }}" alt="{{ $edital->titulo }}">
                         </div>
                         <div class="card-body">
                              <h5>
                                   <a href="{{ route('site.noticias.vizualizar', $edital->slug) }}">
                                        {{$edital->titulo}} 
                                    </a>
                              </h5>
                              {!! strip_tags($edital->descricao) !!}
                         </div>
                         <div class="card-footer">
                              Publicado {{ date('d/m/Y', strtotime($edital->created_at)) }} às {{ date('H:i', strtotime($edital->created_at)) }}
                         </div>
                   </div>
              </div>
          </div>
          @endforeach
          <a href="{{ route('site.postagens.indexEdital') }}" class="btn">Ver todos</a>
          
     </div>
     @endif
       
  </div>
@endsection