@extends('layouts.app')

@section('titulo', 'Agendar visita')
@section('content')
        <div class="container col-11 col-md-10 col-lg-10 p-0">
            <h2>Agendamento de visitas</h2>
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    {!! Session::get('success') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="d-flex flex-wrap-reverse">
                <form id="form-busca" action="{{ route('site.visita.buscar.registro') }}" method="GET" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Digite seu email abaixo para marcar um visita</label>
                        <input id="email" type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{isset($user->email) ? $user->email: old('email')}}" required autocomplete="email" autofocus placeholder="exemplo@exemplo.com">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-btn">
                        <button form="form-busca" class="btn w-100">Iniciar solicitação</button>
                    </div>
                </form>
            </div>
        </div>
@endsection