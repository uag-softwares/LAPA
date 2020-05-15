@extends('layouts.app')

@section('titulo', 'Materiais - '.$disciplina->nome ?? '')
@section('content')
    <div class="container">
        <h2>Materiais</h2>
        <div class="d-flex justify-content-around row">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card mx-auto" style="width:90%">
                    <div class="card-header">
                        <h3>Navegue pelos materiais da {{ ucfirst($disciplina->nome) }}</h3>
                        <input class="form-control" id="pesquisa_materiais" type="search" id="form-autocomplete" placeholder="Pesquisar...">
                    </div>
                                
                    @if (count($registros) < 1)
                        <p>Ops, essa disciplina não possui nenhum material</p>
                    @else
                        <div id="materiais" class="list-group">
                            
                            @foreach ($registros as $registro)
                                <div class="material-group list-group-item list-group-item-action">
                                        <a class="item disciplina-atla-item" href="{{ route('site.materiais.ver_materiais', $registro->id) }}">
                                            {{ $registro->titulo }}
                                        </a>
                                </div>
                            @endforeach

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection 
