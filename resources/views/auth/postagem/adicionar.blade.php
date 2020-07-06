@extends('layouts.app')

@section('titulo', 'Adicionar postagem')
@section('content')
        <div class="container">
            <h2>Adicionar postagem</h2>
            <form action="{{ route('auth.postagem.salvar') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('auth.postagem._form')
                 <div class="input-btn">
                    <input name="rascunho" type="submit" class="btn btn-outline" value="Salvar como rascunho">
                    <input name="publicar" type="submit" class="btn" value="Publicar agora">
                </div>
            </form>
        </div>
@endsection