@extends('layouts.app')

@section('titulo', 'Edital')
@section('content')
    <div class="container" >
        <h2>Evento</h2>

        <div class="card-body d-flex flex-column align-items-center">
            <section>
                <h1 class="mb-4">{{ $registro->titulo}}</h1>
                <article>
                    <img class="img-fluid mb-4" src="{{ asset($registro->anexo) }}" alt="" style="max-height: 400px">
                    <p class="text">{{ $registro->descricao}}</p>
                    <p class="text-footer">Publicado {{ date('d/m/Y', strtotime($registro->created_at)) }} às {{ date('H:i', strtotime($registro->created_at)) }}</p>
                </article>
            </section>                          
        </div>
           
    </div>
@endsection 
 