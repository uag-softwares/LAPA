@extends('layouts.app')

@section('titulo', 'Gerenciar postagens')
@section('content')
        <div class="container">
            <h2>Gerenciar postagens</h2>
            <a href="{{ route('auth.postagem.adicionar') }}" class="btn mb-2">Adicionar</a>
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
                        <th>Autor(ª)</th>
                        <th>Data</th>
                        <th>Anexo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->titulo }}</td>
                        <td>{{ isset($registro->user) ? $registro->user->name : 'Nenhum professor' }}</td>
                        <td>{{ $registro->created_at }}
                        <td>{{ $registro->anexo}}</td>
                        <td>
                            <a href="{{ route('auth.postagem.editar', $registro->id) }}" class="btn">Editar</a>
                            <a href="{{ route('auth.postagem.deletar', $registro->id) }}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar essa postagem?');">Deletar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection