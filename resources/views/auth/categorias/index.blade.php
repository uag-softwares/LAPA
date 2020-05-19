@extends('layouts.app')

@section('titulo', 'Gerenciar categorias')
@section('content')
        <div class="container">
            <h2>Gerenciar categorias</h2>
            <a href="{{ route('auth.categoria.adicionar') }}" class="btn mb-2">Adicionar</a>

            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Disciplina</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->nome }}</td>
                        <td>{{ isset($registro->disciplina) ? ucfirst($registro->disciplina->nome) : 'Nenhuma disciplina' }}</td>
                        <td>
                            <a href="{{ route('auth.categoria.editar', $registro->slug) }}" class="btn">Editar</a>
                            <a href="{{ route('auth.categoria.deletar', $registro->slug) }}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar esta categoria?');">Deletar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection