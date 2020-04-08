@extends('layouts.app')

@section('titulo', 'Login')
@section('content')  
    <form method="POST" action="{{ route('login') }}">
        @csrf      
        <div class="container">
            <h2>Login</h2>
            <div class="form-group">
                <input id="email" type="email" placeholder="E-mail" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('E-mail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="password" type="password" placeholder="Senha" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" >

                @error('Senha')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <div class="form-group text-left">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Lembrar sessão?') }}
                    </label>
                </div>
                @if (Route::has('password.request'))
                    <a class="" href="{{ route('password.request') }}">
                    {{ __('Esqueceu a Senha?') }}
                    </a>
                @endif
            </div>
            <div class="">
                <button type="submit" class="btn">
                    {{ __('Login') }}
                </button>
            </div>
            <hr>
            @if (Route::has('register'))
                <a class="" href="{{ route('register') }}">{{ __('Criar conta') }}</a>
            @endif
        </div>
    </form>
@endsection