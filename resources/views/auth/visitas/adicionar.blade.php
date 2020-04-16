@extends('layouts.app')

@section('titulo', 'Agendar visita')
@section('content')
        <div class="container">
            <h2>Agendar visita</h2>
            <form action="{{ route('auth.visita.salvar') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('auth.visitas._form')
                <div class="input-btn">
                    <button class="btn">Agendar</button>
                </div>
            </form>
        </div>
@endsection