@extends('layouts.app')

@section('titulo', 'Redefinir senha')
@section('content')
<div class="container">
   <h2>{{ __('Redefinir senha') }}</h2>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form method="POST" action="{{ route('auth.password.validatePasswordRequest') }}">
        @csrf
        <div class="form-group">
            <label for="name">Endereço de e-mail</label>
            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn">
            {{ __('Enviar link de redefinição de senha') }}
        </button>
        <hr>

        @if (Route::has('register'))
            <a class="" href="{{ route('login') }}">{{ __('Voltar') }}</a>
        @endif
        
    </form>
</div>
@endsection
