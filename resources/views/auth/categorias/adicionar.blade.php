@extends('layouts.app')

@section('titulo', 'Adicionar categoria')
@section('content')
        <div class="container">
            <h2>Adicionar categoria</h2>
            <form action="{{ route('auth.categoria.salvar') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('auth.categorias._form')
                <div class="input-btn">
                    <button class="btn">Adicionar</button>
                </div>
            </form>
        </div>
@endsection