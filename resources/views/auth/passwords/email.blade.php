@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <h2>Redefinir senha</h2>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        
        <div class="form-group">
          <label for="name"><b>Endereço de e-mail</b></label>
            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('Endereço de e-mail')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn">
            {{ __('Enviar Link de Redefinição de Senha') }}
        </button>
        <br>
        <hr>
        @if (Route::has('register'))
            <a class="" href="{{ route('login') }}">{{ __('Voltar') }}</a>
        @endif
    </form>
</div>
@endsection
