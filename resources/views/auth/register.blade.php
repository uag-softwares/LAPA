@extends('layouts.app')

@section('titulo', 'Registrar-se')
@section('content')
        <div class="container">
            <h2>Cadastro</h2>
            <p>Por favor preencha o formulário para Solicitar acesso ao sistema.</p>
            <form  action="{{ route('register') }}" method="POST" >
                 {{ csrf_field() }}
                 @include('auth.registros._form')
                 <p>Criando uma conta você concorda com nossos <a href="#">Termos & Privacidade</a>.</p>
                 <button type="submit" class="registerbtn btn">Solicitar</button>
                 <hr>
                 @if (Route::has('register'))
                     <p>Já possui acesso ao sistema? <a class="" href="{{ route('login') }}">{{ __('Acessar conta') }}</a>.</p>                    
                @endif
            </form>
        </div>
    
@endsection
