@extends('layouts.app')

@section('titulo', 'Registrar-se')
@section('content')
    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <h2>Cadastro</h2>
            <p>Por favor preencha o formulário para criar uma conta.</p>
            @include('auth.registros._form')
            <p>Criando uma conta você concorda com nossos <a href="#">Termos & Privacidade</a>.</p>
            <button type="submit" class="registerbtn btn">Cadastrar</button>
            <hr>
            @if (Route::has('register'))
                <p>Já possui uma conta? <a class="" href="{{ route('login') }}">{{ __('Acessar conta') }}</a>.</p>                    
            @endif
        </div>
    </form>
@endsection
