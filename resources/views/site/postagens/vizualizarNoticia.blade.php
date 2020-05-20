@extends('layouts.app')

@section('titulo', 'Notícia')
@section('content')
    <div class="container">
        <h2>Notícia</h2>

        <div class="d-flex justify-content-around row text-left">

            <div class="col-11 col-md-10 col-lg-8">
                <h2 class="mb-4">{{ $registro->titulo}}</h2>
                <div class="text-center">
                    <img class="img-fluid mb-4" src="{{ asset($registro->anexo) }}" alt="" style="max-height: 400px">
                </div>
                <p class="text">{!! $registro->toArray()['descricao'] !!}</p>
                <p class="text-footer">Publicado {{ date('d/m/Y', strtotime($registro->created_at)) }} às {{ date('H:i', strtotime($registro->created_at)) }}</p>
            </div>
           
        </div>
    </div>
@endsection 
 