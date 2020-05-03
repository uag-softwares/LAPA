@extends('layouts.app')

@section('titulo', 'Adicionar disciplina')
@section('content')
        <div class="container">
            <h2>Adicionar disciplina</h2>
            <form action="{{ route('auth.disciplina.salvar') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('auth.disciplinas._form')
                <div class="input-btn">
                    <button class="btn">Adicionar disciplina</button>
                </div>
            </form>
        </div>
@endsection