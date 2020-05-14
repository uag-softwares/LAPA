@extends('layouts.app')

@section('titulo', 'Agendar visita')
@section('content')
        <div class="container col-11 col-md-7 col-lg-5">
            <h2>Agendar visita</h2>

            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form id="form-busca" action="{{ route('site.visita.buscar.registro') }}" method="GET" enctype="multipart/form-data">
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
                    <button form="form-busca" class="btn">Iniciar solicitação</button>
                </div>
            </form>
        </div>
@endsection