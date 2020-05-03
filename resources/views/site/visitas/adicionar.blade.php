@extends('layouts.app')

@section('titulo', 'Agendar visita')
@section('content')
        <div class="container">
            <h2>Agendar visita</h2>

            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(isset($email) || $errors->any())
                <form action="{{ route('site.visita.salvar') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @include('auth.visitas._form')
                    <div class="input-btn">
                        <button class="btn">Agendar</button>
                    </div>
                </form>
            @else
                <form action="{{ route('site.visita.buscar.registro') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Digite seu e-mail para começar</label>
                        <input id="email" type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{isset($user->email) ? $user->email: old('email')}}" required autocomplete="email" autofocus placeholder="exemplo@exemplo.com">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-btn">
                        <button class="btn">Iniciar solicitação</button>
                    </div>
                </form>
            @endif
        </div>
@endsection