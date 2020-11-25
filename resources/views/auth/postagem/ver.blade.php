@extends('layouts.app')

@section('titulo', 'Visualizar postagem')
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
            @include('auth.postagem.formVisualizar')
                
        </div>
@endsection