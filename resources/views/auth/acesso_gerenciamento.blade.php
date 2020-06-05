@extends('layouts.app')

@section('titulo', 'Gerenciar Solicitações de Registros')
@section('content')
       <div class="container">
            <h2>Gerenciar Solicitações de Registros</h2>
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="table-responsive">
              <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Sobrenome</th>
			<th>Cpf</th>
			<th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->name}}</td>
			<td>{{ $registro->surname}}</td>
			<td>{{ $registro->cpf}}</td>
                        <td>{{ $registro->email}}</td>
                        <td>
                            <a href="{{ route('auth.acesso_gerenciamento.aceitarSolicitacao', $registro->id) }}" class="btn" onclick="return confirm('Tem certeza que deseja aceitar a solicitação?');">Aceitar</a>
                            <a href="{{ route('auth.acesso_gerenciamento.recusarSolicitacao', $registro->id) }}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja recusar a solicitação?');">Recusar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
             </table>
             <div class="d-flex justify-content-center">
                    {{ $registros->links() }}
             </div>
         </div> 
       </div>
@endsection