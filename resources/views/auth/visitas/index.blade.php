@extends('layouts.app')

@section('titulo', 'Gerenciar postagens')
@section('content')
        <div class="container">
            <h2>Gerenciar solicitações de visitas</h2>
            <a href="{{ route('site.visita.busca') }}" class="btn mb-2">Agendar</a>
            
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
                        <th>Responsável</th>
                        <th>Data</th>
                        <th>Email</th>
                        <th>Confirmada?</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->user->name.' '.$registro->user->surname }}</td>
                        <td>{{ date('d/m/Y', strtotime($registro->data)).' das '.date('H:i', strtotime($registro->hora_inicial)).' às '.date('H:i', strtotime($registro->hora_final)) }}</td>
                        <td>{{ $registro->user->email }}</td>
                        <td>{{ $registro->confirmada ? 'Sim' : 'Não' }}</td>
                        <td>
                            <a href="{{ route('auth.visita.ver', $registro->slug) }}" class="btn">Ver</a>
                            <a href="{{ route('auth.visita.deletar', $registro->id) }}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja cancelar essa visita?');">Cancelar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                    {{ $registros->links() }}
            </div> 
        </div>
@endsection