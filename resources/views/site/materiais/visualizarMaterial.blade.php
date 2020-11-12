@extends('layouts.app')

@section('titulo', $registro->titulo)
@section('content')
    <div class="container">
        <div class="material">
            <h1 class="fadeInDown" data-anime="150">{{ $registro->titulo ?? '' }}</h1>
            <p>
                Postado em {{ date('d/m/Y', strtotime($registro->created_at)) }} às {{ date('H:i', strtotime($registro->created_at)) }}
            </p>
            <div class="img-fluid fadeInDown" data-anime="450" width="760px" height="300px" style="background: no-repeat url('{{ asset($registro->anexo ?? 'img/file-image.svg') }}'); background-size: 100%"></div>
            
                       
            <div class="fadeInDown" data-anime="450">{!! $registro->toArray()['texto'] !!}</div>
        </div>           
    </div>
@endsection 