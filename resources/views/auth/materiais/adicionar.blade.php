@extends('layouts.app')

@section('titulo', 'Adicionar Material')
@section('content')
        <div class="container">
            <h2>Adicionar Material</h2>
            <form action="{{ route('auth.material.salvar') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('auth.materiais._form')
                <div class="input-btn">
                    <button class="btn">Adicionar</button>
                </div>
            </form>
        </div>
@endsection