@extends('layouts.app')
@section('titulo', 'Eventos')
@section('content')
  <div class="container" >
     @if (count($registros) < 1)
        <p>Ops, ainda não temos nenhum evento</p>
     @else
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
             <ol class="carousel-indicators">
                 <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
             </ol>
             <div class="carousel-inner">
                   @foreach($registros as $key => $slider)
                   <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                         <a href="{{ route('site.postagens.vizualizar', $slider->id) }}">
                             <img  title="{{ $slider->titulo}}" src="{{ asset($slider->anexo) }}" class="d-block w-100"  alt="" width="800" height="500">
                             <div class="overlay">"{{ $slider->titulo}}" </div>
        
                         </a>
                         
                         
                   </div>
                   @endforeach
             </div>
                  <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true">     </span>
                     <span style="color:black"class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                  </a>
         </div>
         <div class="col-md-6 col-12 mb-2">
              <div class="card mx-auto" style="width: 80%;margin-top: 50px;">

                   <div class="card-header">
                        <h3>Eventos</h3>
                   </div>
                   <div class="item-list">
                         @if(count($registros) >= 2) 
                                                                        
                              @for($i=0;$i<=1;$i++)

                               <dd style="list-style-type: none;margin-top: 50px;" >
                                    <img src="{{ asset($registros[$i]->anexo) }}" alt="" width="200" height="100"></img>
                                    <li style= "font-size:90%;list-style-type:disc;text-align:left;"> <a href="{{ route('site.postagens.vizualizar', $registros[$i]->id) }}">
                                         {{$registros[$i]->titulo}} </a>
                                    </li>
                                    <li style="font-size:70%;text-align:left;">Data da publicação: {{ $registros[$i]->created_at }}</li>
				    
                               </dd>
                              @endfor
                               <p > <a style= "color:red;" href="{{ route('site.postagens.index') }}">
                                         Clique aqui para vizualizar Todos os eventos </a>
                               </p>
                         @endif      
                              
                  </div>
                        
             </div>
        </div>
        
       @endif 
  </div>
@endsection 


