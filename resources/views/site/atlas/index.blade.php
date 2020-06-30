@extends('layouts.app')

@section('titulo', 'Atlas Interativo')

@php($numero_categorias = count($categorias))
@php($numero_disciplinas = count($disciplinas))

@section('content')
    <div class="container">
        <h2>Atlas Interativo</h2>
        <div class="d-flex justify-content-around row">

            @if ($numero_categorias < 1 || $numero_disciplinas < 1)
                <p>Ops, ainda não temos nenhuma página no atlas</p>
            @else

                <div class="col-11 col-md-10 col-lg-8">
                    <div class="card">

                        <div class="card-header">
                            <input class="form-control" id="pesquisa_categoria" type="search" id="form-autocomplete" placeholder="Pesquisar...">
                        </div>
                        <div id="categorias" class="list-group">
                            
                            <div class="material-group header list-group-item list-group-item-action disabled">
                                <span>Categoria</span>
                                <span>Disciplina</span>
                            </div>

                            @for ($i = 0; $i < ($numero_categorias > $numero_disciplinas ? $numero_categorias : $numero_disciplinas); $i++)
                                <div class="material-group list-group-item list-group-item-action">

                                    @if ($numero_categorias > $i && count($categorias[$i]->atla) >= 1)
                                        <a class="item" href="{{ route('site.atlas.categoria', $categorias[$i]->slug) }}">
                                            {{ ucfirst($categorias[$i]->nome) }}
                                        </a>
                                    @endif
                                    @if ($numero_disciplinas > $i && count($disciplinas[$i]->categoria) >= 1)
                                        <a class="item" href="{{ route('site.atlas.disciplina', $disciplinas[$i]->slug) }}">
                                            {{ ucfirst($disciplinas[$i]->nome) }}
                                        </a>
                                    @endif

                                </div>
                            @endfor
                                    
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection 