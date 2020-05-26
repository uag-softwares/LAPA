@extends('layouts.app')

@section('titulo', 'Gerenciar disciplinas')
@section('content')
        <div class="container">
            <h2>Gerenciar disciplinas</h2>
            <a href="{{ route('auth.disciplina.adicionar') }}" class="btn mb-2">Adicionar</a>

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
                        <th>Professor</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registros as $registro)
                    <tr>
                        <td>{{ ucfirst($registro->nome) }}</td>
                        <td>{{ isset($registro->user) ? $registro->user->name : 'Nenhum professor' }}</td>
                        <td>
                            <a href="{{ route('auth.disciplina.editar', $registro->slug) }}" class="btn">Editar</a>
                            <a href="{{ route('auth.disciplina.deletar', $registro->slug) }}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar a disciplina?');">Deletar</a>
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


           