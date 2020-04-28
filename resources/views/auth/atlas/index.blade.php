@extends('layouts.app')

@section('titulo', 'Gerenciar atlas')
@section('content')
        <div class="container">
            <h2>Gerenciar atlas</h2> 
            <a href="{{ route('auth.atla.adicionar') }}" class="btn mb-2">Adicionar</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Categoria</th>
                        <th>Publicado</th>                        
                        <th>Ações</th>
                    </tr>
               </thead>
                <tbody>
                    @foreach ($registros as $registro)
                        <tr>
                            <td>{{ $registro->titulo }}</td>
                            <td>{{ isset($registro->categoria) ? $registro->categoria->nome : 'Nenhuma categoria' }}</td>
                            <td>{{ $registro->publicado ? "Sim" : "Não" }}</td>
                            <td>
                                <a href="{{ route('auth.atla.editar',$registro->id) }}" class="btn">Editar</a>
                                <a href="{{ route('auth.atla.deletar', $registro->id) }}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar esse atla');">Deletar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection 