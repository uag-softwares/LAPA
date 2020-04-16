@extends('layouts.app')

@section('titulo', 'Editar Material')
@section('content')
        <div class="container">
            <h2>Editar Material</h2>
            <form action="{{ route('auth.material.atualizar', $registro->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                @include('auth.materiais._form')
                <div class="input-btn">
                    <button class="btn">Editar</button>
                </div>
            </form>
        </div>
@endsection