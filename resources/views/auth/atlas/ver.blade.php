@extends('layouts.app')

@section('titulo', 'Atlas Interativo')
@section('content')
<div class="d-flex position-relative">
    <div id="page" class="d-flex flex-column container py-4 col-lg-10"> 
        @if (!isset($registro))
            <p>Ops, essa página não existe</p>
        @else
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(isset($registro))
                <p>Essa página do atlas está <strong>{{ $registro->publicado ? 'publicada' : 'salva no rascunho' }}.</strong></p>
            @endif
            <div class="input-btn">
                <a href="{{ route('auth.atla.editar', $registro->slug) }}" class="btn btn-outline">Editar publicação</a>
                
                @if(isset($registro) && !$registro->publicado)
                    <a href="{{ route('auth.atla.publicar', $registro->slug) }}" class="btn">Publicar agora</a>
                @endif
            </div>
            
            <div class="row justify-content-between fadeInDown border-top mt-3 pt-4" data-anime="300">
                <div class="col-md-8 col-12 text-left">
                    <h2 class="title pb-3">{{ $registro->titulo }}</h2>
                    <p class="info" style="text-transform: capitalize;">
                        <a style="color: white;" href="{{ route('site.atlas.disciplina', $categoria->disciplina) }}">
                            <span class="tag evento">{{ $categoria->disciplina->nome}}</span>
                        </a>
                        
                        <span class="tag evento">/</span>

                        <a style="color: white;" href="{{ route('site.atlas.categoria', $categoria) }}">
                            <span class="tag evento">{{ $categoria->nome }}</span>
                        </a>
                    </p>
                    <p class="text">
                        {!! $registro->toArray()['descricao'] !!}
                    </p>
                </div>
                <div id="overlay"></div>
                <div class="col-md-4 col-12 mb-4">
                    <img class="img img-fluid" src="{{ asset($registro->anexo) }}"> 
                </div>
            </div>

        @endif
    </div>
</div>
@endsection