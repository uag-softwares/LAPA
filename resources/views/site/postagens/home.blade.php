@extends('layouts.app')
@section('titulo', 'Principais Notícias')
@section('content')
  <div class="container" >
     @if (count($registros) < 1)
        <p>Ops, ainda não temos nenhum evento</p>
     @else
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
               </ol>
               <div class="carousel-inner">

                    @foreach($registros as $key => $slider)
                         <div class="carousel-item {{$key == 0 ? 'active' : '' }}" data-interval="5000">
                              <img src="{{ asset($slider->anexo) }}" class="d-block w-100" alt="Imagem do banner de postagens">
                              <a class="carousel-caption" href="{{ route('site.noticias.vizualizar', $slider->slug) }}">
                                   <h2>{{ $slider->titulo}}</h2>
                              </a>
                         </div>
                    @endforeach

               </div>
               <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
                    <span class="fas fa-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="fas fa-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
               </a>
         </div>        
       @endif 
  </div>
@endsection 


