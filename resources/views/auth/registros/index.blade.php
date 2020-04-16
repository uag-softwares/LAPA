@extends('layouts.app')

@section('titulo', 'Gerenciar usuários')
@section('content')
<div class="container">
    <h2>Configurações do Usuário</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cpf</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ Auth::user()->name }}</td>
                <td>{{Auth::user()->cpf}}</td>
                <td>{{Auth::user()->email}}</td>
                <td>
                    <a class="btn" href="{{ route('auth.registros.editar') }}">Editar</a>
                    <a class="btn btn-danger" href="{{ route('auth.registros.deletar',Auth::user()->id) }}"onclick="return confirm('Tem certeza que deseja excluir a conta?');">Deletar</a> 
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection