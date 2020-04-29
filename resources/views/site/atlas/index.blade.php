@extends('layouts.app')

@section('titulo', 'Atlas Interativo')
@section('content')
    <div class="container">
        <h2>Atlas Interativo</h2>
        <div class="breadcrumbs d-flex text-left justify-content-sm-start justify-content-between">
            <p>
                <a href="{{ route('site.home') }}">Início</a> /
                Atlas interativo
            </p>
        </div>
        <div class="d-flex justify-content-around row">

            @if (count($categorias) < 1 || count($disciplinas) < 1)
                <p>Ops, ainda não temos nenhuma página no atlas</p>
            @else

                <div class="col-md-6 col-12 mb-2">
                    <div class="card mx-auto" style="width: 80%">

                        <div class="card-header">
                            <h3>Navegue por categorias</h3>
                            <input class="form-control" id="pesquisa_categoria" type="search" id="form-autocomplete" placeholder="Pesquisar...">
                        </div>

                        <div class="card-body d-flex flex-column align-items-center">
                            <div id="categorias" class="list-group">

                                @foreach ($categorias as $categoria)

                                    @if (count($categoria->atla) >= 1)
                                        <a class="list-group-item list-group-item-action" href="{{ route('site.atlas.categoria', $categoria->id) }}">
                                            {{ $categoria->nome }}
                                            <span class="badge badge-primary badge-pill">{{ $categoria->atla[0]->quantidadeAtlasPublicados() }}</span>
                                        </a>
                                    @endif

                                @endforeach
                                
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="card mx-auto" style="width: 80%">

                        <div class="card-header">
                            <h3>Navegue por disciplinas</h3>
                            <input class="form-control" id="pesquisa_disciplina" type="search" id="form-autocomplete" placeholder="Pesquisar...">
                        </div>

                        <div class="card-body d-flex flex-column align-items-center">
                            <div id="disciplinas" class="list-group">

                                @foreach ($disciplinas as $disciplina)
                                    
                                    @if (count($disciplina->categoria) >= 1)
                                        <a class="list-group-item list-group-item-action" href="{{ route('site.atlas.disciplina', $disciplina->id) }}">
                                            {{ ucfirst($disciplina->nome) }}
                                        </a>
                                    @endif

                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

            @endif
        </div>
    </div>
@endsection 