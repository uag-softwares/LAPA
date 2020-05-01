@extends('layouts.app')
@section('titulo', 'Eventos')
@section('content')
    <div class="container" >
        <h2>Lista de Eventos</h2>
        <div class="breadcrumbs d-flex text-left justify-content-sm-start justify-content-between">
            <p>
                <a href="{{ route('site.home') }}">Início</a> /
                Eventos
            </p>
        </div>
        <div class="d-flex justify-content-around row">

            @if (count($registros) < 1)
                <p>Ops, ainda não temos nenhum evento</p>
            @else
        
            <div class="item-list">
                   
                  @foreach ($registros as $registro)
                       <dd style="list-style-type: none;">
                          <img src="{{ asset($registro->anexo) }}" alt="" width="200" height="100"></img>
                          <li style= "font-size:90%;list-style-type:disc;text-align:left;"> <a href="{{ route('site.postagens.vizualizar', $registro->id) }}">
                               {{$registro->titulo}} </a>
                          </li>
                          <li style="font-size:70%;text-align:left;">Data da publicação: {{ $registro->created_at }}</li>
                      </dd>
                                          
                  @endforeach       
                              
                  
            </div>
            @endif
         </div>
    </div>
@endsection 


