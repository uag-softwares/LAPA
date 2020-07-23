@extends('layouts.app')
@section('titulo', 'Início')
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
          <a href="{{ route('site.postagens.indexNoticia') }}" class="btn">Ver todas as notícias</a>      
     @endif

     @if(isset($eventos) && count($eventos) != 0)
     <div class="mb-5">
          <h2 class="mb-3 mt-4">Próximos eventos</h2>
          <div class="d-flex flex-wrap justify-content-center">
          
          @foreach ($eventos as $registro)
               @include('site.postagens._card')
          @endforeach

          </div>
          <a href="{{ route('site.postagens.indexEvento') }}" class="btn">Ver todos</a>
     </div>
     @endif

     @if(isset($editais) && count($editais) != 0)
     <div class="mb-5">
          <h2 class="mb-3 mt-4">Últimos editais</h2>
          <div class="d-flex flex-wrap justify-content-center">
          
          @foreach ($editais as $registro)
               @include('site.postagens._card')
          @endforeach

          </div>
          <a href="{{ route('site.postagens.indexEdital') }}" class="btn">Ver todos</a>
          
     </div>
     @endif
       
  </div>
@endsection