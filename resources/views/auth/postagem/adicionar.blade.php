@extends('layouts.app')

@section('titulo', 'Adicionar postagem')
@section('content')
        <div class="container">
            <h2>Adicionar postagem</h2>
            <form action="{{ route('auth.postagem.salvar') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('auth.postagem._form')
                <div class="input-btn">
                    <button class="btn">Adicionar</button>
                </div>
            </form>
        </div>
@endsection