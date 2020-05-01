@extends('layouts.app')

@section('titulo', 'Materiais')
@section('content')
<div class="container">
    <h2> Materiais</h2>
    <div class="d-flex justify-content-around row">

        <div class="col-md-6 col-12">
            <div class="card mx-auto" style="width: 115%">
                <div class="card-header">
                    <input class="form-control" id="pesquisa_disciplina" type="search" id="form-autocomplete"
                        placeholder="Pesquisar...">
                </div>
                <div class="list-group">
                    <div class="material-group header list-group-item list-group-item-action disabled">
                        <span>Disciplina</span>
                        <span>Professor</span>
                    </div>
                        @foreach ($disciplinas as $disciplina)
                            <div id="disciplinas" class="material-group list-group-item list-group-item-action">
                                <a class="material-item" href="{{ route('site.materiais.disciplina', $disciplina->id) }}">
                                    {{ ucfirst($disciplina->nome) }}
                                </a>
                                <a class="material-item" href="{{ route('site.materiais.disciplina', $disciplina->id) }}">
                                    {{ $disciplina->user->name }}
                                </a>
                            </div>
                        @endforeach
                </div>
             </div>
        </div>

    </div>
</div>
@endsection
