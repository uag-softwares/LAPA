@extends('layouts.app')
@section('titulo', 'Informações do Contato Laboratório')

@section('conteudo')
<div class="content">
    <div class="item-title">
        <h1>Novas informações de Contato</h1>
    </div>
    <div class="item-form">
        <form action="{{ route('auth.contato.salvar') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('auth.contato._form')

            <div class="input-btn">
                <button class="btn">Salvar</button>
            </div>
        </form>
    </div>
</div>
@endsection