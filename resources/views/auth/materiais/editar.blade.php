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
                    <input name="rascunho" type="submit" class="btn btn-outline" value="Salvar como rascunho">
                    <input name="publicar" type="submit" class="btn" value="Publicar agora">
                </div>
            </form>
        </div>
@endsection