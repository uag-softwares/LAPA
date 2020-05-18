@extends('layouts.app')

@section('titulo', 'Atlas Interativo - '.$disciplina->nome ?? '')
@section('content')
    <div class="container">
        <h2>Atlas Interativo</h2>
        <div class="breadcrumbs d-flex text-left justify-content-sm-start justify-content-between">
            <p>
                <a href="{{ route('site.home') }}">Início</a> /
                <a href="{{ route('site.atlas.index') }}">Atlas interativo</a> /
                {{ ucfirst($disciplina->nome) }}
            </p>
        </div>
        <div class="d-flex justify-content-around">
            <div class="card" style="width:70%">
                <div class="card-header">
                    <h3>Navegue pelas categorias de {{ ucfirst($disciplina->nome) }}</h3>
                    <input class="form-control" id="pesquisa_categoria" type="search" id="form-autocomplete" placeholder="Pesquisar...">
                </div>
                @if (count($paginas) < 1)
                    <p>Ops, essa disciplina não possui nenhuma categoria ou atlas</p>
                @else
                    <div class="card-body d-flex flex-column align-items-center">
                        <div id="categorias" class="list-group">

                            @foreach ($registros as $registro)
                                
                                @if (count($registro->atla) >= 1)
                                    <a class="list-group-item list-group-item-action" href="{{ route('site.atlas.categoria', $registro->slug) }}">
                                        {{ $registro->nome }}
                                        <span class="badge badge-primary badge-pill">{{ $registro->atla[0]->quantidadeAtlasPublicados() }}</span>
                                    </a>
                                @endif
                                
                            @endforeach

                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection 