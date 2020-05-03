@extends('layouts.app')

@section('titulo', 'Eventos')
@section('content')
    <div class="container" >
        <h2>Evento</h2>
        <div class="breadcrumbs d-flex text-left justify-content-sm-start justify-content-between">
            <p>
                <a href="{{ route('site.postagens.home') }}">Início</a> /
                Eventos
            </p>
        </div>
        <div class="card-body d-flex flex-column align-items-center">
            <section>
                <h1 class="mb-4">{{ $registro->titulo}}</h1>
                <article>
                    <img class="img-fluid mb-4" src="{{ asset($registro->anexo) }}" alt="" style="max-height: 400px">
                    <p class="text">{{ $registro->descricao}}</p>
                    <p class="text-footer">Publicado por {{ isset($registro->user) ? $registro->user->name : '' }} as {{ $registro->created_at }}</p3>
                
                </article>
            </section>                          
        </div>
           
    </div>
@endsection 
 