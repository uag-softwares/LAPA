@extends('layouts.app')

@section('titulo', 'Adicionar Material')
@section('content')
        <div class="container">
            <h2>Adicionar Material</h2>
            <form action="{{ route('auth.material.salvar') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('auth.materiais._form')
                <div class="input-btn">
                    <input name="rascunho" type="submit" class="btn btn-outline" value="Salvar como rascunho">
                    <input name="publicar" type="submit" class="btn" value="Publicar agora">
                </div>
            </form>
                               
        </div>
@endsection