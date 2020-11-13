@extends('layouts.app')

@section('titulo', $registro->titulo)
@section('content')
    <div class="container">
        @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        @endif
        @if(isset($registro))
                <p>Essa postagem está <strong>{{ $registro->publicado ? 'publicada' : 'salva no rascunho' }}.</strong></p>
        @endif
        <div class="input-btn">
                <a href="{{ route('auth.postagem.editar', $registro->slug) }}" class="btn btn-outline">Editar publicação</a>
                
                @if(isset($registro) && !$registro->publicado)
                    <a href="{{route('auth.postagem.publicar', $registro->slug) }}" class="btn">Publicar agora</a>
                @endif
        </div>
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
 