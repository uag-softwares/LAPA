@extends('layouts.app')

@section('titulo', $registro->titulo)
@section('content')
    <div class="container">
        <div class="postagem">
            <h1 class="fadeInDown" data-anime="150">{{ $registro->titulo ?? '' }}</h1>
            <p class="info fadeInDown" data-anime="300">
                <span class="tag {{ $registro->tipo_postagem ?? '' }}">{{ $registro->tipo_postagem ?? '' }}</span>
                Postado em {{ date('d/m/Y', strtotime($registro->created_at)) }} às {{ date('H:i', strtotime($registro->created_at)) }}
            </p>
            <div class="img-fluid fadeInDown" data-anime="450" width="760px" height="300px" style="background: no-repeat url('{{ asset($registro->anexo ?? 'img/file-image.svg') }}'); background-size: 100%"></div>
            
            @if($registro->tipo_postagem == 'evento')
                <p class="evento-info fadeInDown" data-anime="450">
                    <strong>Data do evento:</strong> {{ date('d/m/Y', strtotime($registro->data)) }} às {{ date('H:i', strtotime($registro->hora)) }}
                </p>
            @endif
            
            <div class="fadeInDown" data-anime="450">{!! $registro->toArray()['descricao'] !!}</div>
            @if($registro->tipo_postagem == 'evento')
                <p class="evento-info fadeInDown" data-anime="450">
                    <strong>Data do evento:</strong> {{ date('d/m/Y', strtotime($registro->data)) }} às {{ date('H:i', strtotime($registro->hora)) }}
                </p>
            @endif
        </div>           
    </div>
@endsection 
 