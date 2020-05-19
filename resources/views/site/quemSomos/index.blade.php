@extends('layouts.app')
@section('titulo', 'Professores')
@section('content')
    <div class="container" >
        <h2>Professores</h2>

        <div class="d-flex justify-content-around row">

            @if (count($registros) < 1)
                <p>Ops, ainda não temos professores cadastrados</p>
            @else
        
            <div class="row col-12 justify-content-center">
                   
                  @foreach ($registros as $registro)
                      <div class="col-11 col-md-5 col-lg-4 m-2 px-5 shadow-sm border rounded" id="usuarios">
                            <div class="img">
                                <img class="img-fluid rounded" src="{{ asset($registro->avatar) }}" alt="Foto do Professor(ª)" height="200" width="200">
                            </div>
                            <div class="m-4 text-center text-md-left">
                                <a href="{{ route('site.quemSomos.vizualizar', $registro->slug) }}">
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


