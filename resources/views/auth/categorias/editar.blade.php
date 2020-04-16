@extends('layouts.app')

@section('titulo', 'Editar categoria')
@section('content')
        <div class="container">
            <h2>Editar categoria</h2>
            <form action="{{ route('auth.categoria.atualizar', $registro->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                @include('auth.categorias._form')
                <div class="input-btn">
                    <button class="btn">Editar</button>
                </div>
            </form>
        </div>
@endsection