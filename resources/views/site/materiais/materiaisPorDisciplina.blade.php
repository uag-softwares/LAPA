@extends('layouts.app')

@section('titulo', 'Materiais - '.$disciplina->nome ?? '')
@section('content')
    <div class="container">
        <h2>Materiais</h2>
        <div class="d-flex justify-content-around">
            <div class="card" style="width:70%">
                <div class="card-header">
                    <h3>Navegue pelos materiais da {{ ucfirst($disciplina->nome) }}</h3>
                    <input class="form-control" id="pesquisa_materiais" type="search" id="form-autocomplete" placeholder="Pesquisar...">
                </div>
                               
                @if (count($registros) < 1)
                    <p>Ops, essa disciplina não possui nenhum material</p>
                @else
                    <div class="card-body d-flex flex-column align-items-center">
                        <div id="materiais" class="list-group">
                        
                            @foreach ($registros as $registro)
                                    <a class="list-group-item list-group-item-action" href="{{ route('site.materiais.ver_materiais', $registro->slug) }}">
                                        {{ $registro->titulo }}
                                    </a>
                            @endforeach

                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection 
