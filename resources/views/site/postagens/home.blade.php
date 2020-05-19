@extends('layouts.app')
@section('titulo', 'Principais Notícias')
@section('content')
  <div class="container" >
     @if (count($registros) < 1)
        <p>Ops, ainda não temos nenhum evento</p>
     @else
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
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
  </div>
@endsection 


