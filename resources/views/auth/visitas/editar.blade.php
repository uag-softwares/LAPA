@extends('layouts.app')

@section('titulo', 'Editar postagem')
@section('content')
        <div class="container">
            <h2>Ver detalhes da visita</h2>
            <form action="{{ route('auth.visita.atualizar', $registro->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                @include('auth.visitas._form')
                <div class="input-btn">
                    <button class="btn">Editar</button>
                </div>
            </form>
        </div>
@endsection