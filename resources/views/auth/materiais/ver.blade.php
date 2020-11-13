@extends('layouts.app')

@section('titulo', $registro->titulo)
@section('content')
    <div class="container">
        @if(isset($registro))
            <p>Esse material está <strong>{{ $registro->publicado ? 'publicado' : 'salva no rascunho' }}.</strong></p>
        @endif 

        <div class="input-btn">
            <a href="{{ route('auth.material.editar', $registro->slug) }}" class="btn btn-outline">Editar publicação</a>

            @if(isset($registro) && !$registro->publicado)
                <a href="{{ route('auth.material.publicar', $registro->slug) }}" class="btn">Publicar agora</a>
            @endif
        </div>
        <br />

        <div class="postagem">
            <h1 class="fadeInDown" data-anime="150">{{ $registro->titulo ?? '' }}</h1>
            <p>
                Postado em {{ date('d/m/Y', strtotime($registro->created_at)) }} às {{ date('H:i', strtotime($registro->created_at)) }}
            </p>
            <div class="fadeInDown" data-anime="450">{!! $registro->toArray()['texto'] !!}</div>
        
            <div class="text-center">
                @if(isset($registro->anexo))
                    <a class="btn" href="{{ asset($registro->anexo) }}" alt="" download="baixar">Baixar anexo</a>
                @endif
            </div>
        </div>   
            
    </div> 


    
@endsection 