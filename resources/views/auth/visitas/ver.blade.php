@extends('layouts.app')

@section('titulo', 'Ver visita')
@section('content')
        <div class="container">
            <h3 class="mb-4">Detalhes da visita dia <b style="border: 1px solid #000;">{{ date('d/m/Y', strtotime($registro->data)) }}</b> das <b style="border: 1px solid #000;">{{ $registro->hora_inicial }}</b> às <b style="border: 1px solid #000;">{{$registro->hora_final }}</b></h2>
            <div class="visita-detalhes">
                <p>Responsável pela visita: <b>{{ $registro->user->name ?? 'Não informado' }}</b></p>
                <p>Telefone: <b>{{ $registro->user->telephone ?? 'Não informado' }}</b></p>
                <p>Email: <b>{{ $registro->user->email ?? 'Não informado' }}</b></p>
                <p>Mensagem do Responsável:</p>
            </div>
            <div class="visita-msg">
                <p>{{ $registro->descricao }}</p>
            </div>
            @if (!$registro->confirmada)    
                <form action="{{ route('auth.visita.atualizar', $registro->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <input style="display: none;" type="checkbox" name="confirmada" checked>
                    <div class="input-btn mt-2">
                        <button class="btn">Confirmar visita</button>
                    </div>
                </form>
            @else
                <p class="mt-2">Essa visita já foi confirmada! 
                    <br> Você pode cancelar se assim desejar
                </p>
            @endif
            <a href="{{ route('auth.visita.deletar', $registro->id) }}" class="btn btn-danger mt-2" onclick="return confirm('Tem certeza que deseja cancelar essa visita?');">Cancelar</a>
        </div>
@endsection