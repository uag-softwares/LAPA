@extends('layouts.app')

@section('titulo', 'Materiais')
@section('content')
<div class="d-flex position-relative">

    <div id="page" class="container col-lg-10 atlas">    
        <h2>Material</h2>
            <div class="row justify-content-between">
                <div class="col-md-8 col-12 text-center">
                    <h3 class="title">{{ $registro->titulo }}</h3>
                    <p class="text">
                        {{ $registro->texto }}
                    </p>
                </div>
                
                <div class="col-md-4 col-12">
                    <a href="{{ asset($registro->anexo) }}" alt="" download="baixar">Clique aqui para fazer downaload. </a>
                </div>
            </div>
    </div>
</div>
@endsection
