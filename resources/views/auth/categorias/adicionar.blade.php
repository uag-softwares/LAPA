@extends('layouts.app')

@section('titulo', 'Adicionar área de conhecimento')
@section('content')
        <div class="container">
            <h2>Adicionar área de conhecimento (categoria)</h2>
            <form action="{{ route('auth.categoria.salvar') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('auth.categorias._form')
                <div class="input-btn">
                    <button class="btn">Adicionar</button>
                </div>
            </form>
        </div>
@endsection