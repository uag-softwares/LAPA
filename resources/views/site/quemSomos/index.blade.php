@extends('layouts.app')
@section('titulo', 'Professores')
@section('content')
    <div class="container" >
        
        <div class="breadcrumbs d-flex text-left justify-content-sm-start justify-content-between">
            <h2>Professores</h2>
        </div>
        <div class="d-flex justify-content-around row">

            @if (count($registros) < 1)
                <p>Ops, ainda não temos professores cadastrados</p>
            @else
        
            <div class="item-list px-4">
                   
                  @foreach ($registros as $registro)
                      <div class="d-block d-md-flex my-3 shadow-sm rounded" id="usuarios">
                          <!--<img src="{{ asset($registro->anexo) }}" alt="" width="200" height="100"></img> -->
                          <div class="img">
                                <img class="img-fluid rounded" src="{{ asset($registro->avatar) }}" alt="Foto do Professor(ª)" height="200" width="200">
                            </div>
                          <div class="m-4 text-center text-md-left">
                                <a href="{{ route('site.quemSomos.vizualizar', $registro->id) }}">
                                    {{$registro->name}}
                                </a>
                                <p style="font-size:70%;text-align:left;">Email:
                                     <a href = "mailto:{{ $registro->email}}">{{ $registro->email}}</a> 
                                </p>
                            </div>
                          
                          
                      </div>
                                          
                  @endforeach       
                              
                  
            </div>
            @endif
         </div>
    </div>
@endsection 


