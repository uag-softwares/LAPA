@extends('layouts.app')

@section('titulo', 'Atlas Interativo')
@section('content')
    <div class="container">
        <h2>Atlas Interativo</h2>
        <div class="d-flex justify-content-around">
            <ul>
                <h3>Navegue por categorias 
                    <span class="fas fa-caret-down"></span>
                </h3>
                @foreach ($categorias as $categoria)
                    <li><a href="{{ route('site.atlas.categoria', $categoria->id) }}">{{ $categoria->nome }}</a></li>
                @endforeach
            </ul>

        </div>
    </div>
@endsection 