@extends('layouts.app')

@section('titulo', 'Editar atla')
@section('content')
        <div class="container">
            <h2>Editar página do atlas</h2>
            <form action="{{ route('auth.atla.atualizar', $registro->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                @include('auth.atlas._form')
                <div class="input-btn">
                    <button class="btn">Editar</button>
                </div>
            </form>
        </div>
@endsection