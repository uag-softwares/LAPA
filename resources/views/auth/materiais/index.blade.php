@extends('layouts.app')

@section('titulo', 'Gerenciar Materiais')
@section('content')
        <div class="container">
            <h2>Gerenciar Materiais</h2>
            <a href="{{ route('auth.material.adicionar') }}" class="btn mb-2">Adicionar</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Texto</th>
			<th>Anexo</th>
			<th>Disciplina</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->titulo }}</td>
			<td>{{ $registro->texto}}</td>
			<td>{{ $registro->anexo}}</td>
                        <td>{{ isset($registro->disciplina) ? $registro->disciplina->nome : 'Nenhum professor' }}
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