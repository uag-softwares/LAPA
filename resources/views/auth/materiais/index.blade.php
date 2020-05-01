@extends('layouts.app')

@section('titulo', 'Gerenciar Materiais')
@section('content')
        <div class="container">
            <h2>Gerenciar Materiais</h2>
            <a href="{{ route('auth.material.adicionar') }}" class="btn mb-2">Adicionar</a>
            
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
                        <th>Título</th>
            			<th>Disciplina</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->titulo }}</td>
                        <td>{{ isset($registro->disciplina) ? ucfirst($registro->disciplina->nome) : 'Nenhum professor' }}
                        <td>
                            <a href="{{ route('auth.material.editar', $registro->id) }}" class="btn">Editar</a>
                            <a href="{{ route('auth.material.deletar', $registro->id) }}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar o material?');">Deletar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection