@extends('layouts.app')

@section('titulo', 'Materiais')
@section('content')
<div class="container">
    <h2> Materiais</h2>
    <div class="d-flex justify-content-around row">

        <div class="col-11 col-md-10 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <input class="form-control" id="pesquisa_disciplina" type="search" id="form-autocomplete"
                        placeholder="Pesquisar...">
                </div>
                <div class="list-group">
                    <div class="material-group header list-group-item list-group-item-action disabled">
                        <span>Assunto</span>
                        <span>Professor</span>
                    </div>
                    
                    @foreach ($disciplinas as $disciplina)
                        <div id="disciplinas" class="material-group list-group-item list-group-item-action">
                            <a class="item material-item" href="{{ route('site.materiais.disciplina', $disciplina->slug) }}">
                                {{ ucfirst($disciplina->nome) }}
                            </a>
                            
                            @if(isset($disciplina->user))
                                <a class="item material-item" href="{{ route('site.materiais.disciplina', $disciplina->slug) }}">
                                    {{ $disciplina->user->name ?? '' }}
                                </a>
                            @endif

                        </div>
                    @endforeach
                        
                </div>
             </div>
        </div>

    </div>
</div>
@endsection
