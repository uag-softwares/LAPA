@extends('layouts.app')

@section('titulo', 'Editar Informações de Contato do Laboratório')
@section('content')
        <div class="container">
            <h2>Editar contato</h2>
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form action="{{ route('auth.contato.atualizar', $registro->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                @include('auth.contato._form')
                <div class="input-btn">
                    <button class="btn">Salvar alterações</button>
                </div>
            </form>
        </div>
@endsection