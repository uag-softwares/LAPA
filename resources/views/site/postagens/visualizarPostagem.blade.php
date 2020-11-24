@extends('layouts.app')

@section('titulo', $registro->titulo)
@section('content')
    <div class="container">
         @include('auth.postagem.formVisualizar')   
    </div>
@endsection 
 