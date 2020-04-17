@extends('layouts.app')

@section('titulo', 'Gerenciar postagens')
@section('content')
        <div class="container">
            <h2>Gerenciar solicitações de visitas</h2>
            <a href="{{ route('auth.visita.adicionar') }}" class="btn mb-2">Agendar</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Responsável</th>
                        <th>Data</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Confirmada?</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->responsavel }}</td>
                        <td>{{ date('d/m/Y', strtotime($registro->data)).' das '.date('H:i', strtotime($registro->hora_inicial)).' às '.date('H:i', strtotime($registro->hora_final)) }}</td>
                        <td>{{ $registro->telefone }}</td>
                        <td>{{ $registro->email }}</td>
                        <td>{{ $registro->confirmada ? 'Sim' : 'Não' }}</td>
                        <td>
                            <a href="{{ route('auth.visita.ver', $registro->id) }}" class="btn">Ver</a>
                            <a href="{{ route('auth.visita.deletar', $registro->id) }}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja cancelar essa visita?');">Cancelar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection