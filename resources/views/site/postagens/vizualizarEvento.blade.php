@extends('layouts.app')

@section('titulo', 'Evento')
@section('content')
    <div class="container" >
        
        <div class="breadcrumbs d-flex text-left justify-content-sm-start justify-content-between">
            <p>
                 <h2>Evento</h2>
            </p>
        </div>
        <div class="card-body d-flex flex-column align-items-center">
            <section>
                <h1 class="mb-4">{{ $registro->titulo}}</h1>
                <article>
                    <img class="img-fluid mb-4" src="{{ asset($registro->anexo) }}" alt="" style="max-height: 400px">
                    <p class="text">{{ $registro->descricao}}</p>
                    <p class="text">Data do evento: {{ date('d/m/Y', strtotime($registro->data)) }} às {{ date('H:m', strtotime($registro->hora)) }}</p>
                    <p class="text-footer">Publicado {{ date('d/m/Y', strtotime($registro->created_at)) }} às {{ date('H:m', strtotime($registro->created_at)) }}</p>
                </article>
            </section>                          
        </div>
           
    </div>
@endsection 
 