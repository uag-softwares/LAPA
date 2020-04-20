@extends('layouts.app')

@section('titulo', 'Adicionar atla')
@section('content')
        <div class="container">
            <h2>Adicionar página do atlas</h2>
            <form action="{{ route('auth.atla.salvar') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('auth.atlas._form')
                <div class="input-btn">
                    <button class="btn">Adicionar</button>
                </div>
            </form>
        </div>
@endsection