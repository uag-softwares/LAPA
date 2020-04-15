@extends('layouts.app')

@section('titulo', 'Gerenciar categorias')
@section('content')
        <div class="container">
            <h2>Gerenciar categorias</h2>
            <a href="{{ route('auth.categoria.adicionar') }}" class="btn mb-2">Adicionar</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->nome }}</td>
                        <td>
                            <a href="{{ route('auth.categoria.editar', $registro->id) }}" class="btn">Editar</a>
                            <a href="{{ route('auth.categoria.deletar', $registro->id) }}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar esta categoria?');">Deletar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection