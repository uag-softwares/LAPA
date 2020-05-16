@extends('layouts.app')

@section('titulo', 'Professores')
@section('content')
    <div class="container" >
        <h2>Perfil Profissional</h2>
        <div class="row justify-content-center">
                <div class="col-11 col-md-8 col-lg-6 p-4 border rounded">
                    <section>
                        <h2 style= "font-size:120%;text-align:justify;">{{ $registro->name}} {{ $registro->surname}}</h2>
                        <p style= "font-size:90%;text-align:justify;">E-mail: {{ $registro->email }}</p>
                        {{-- <img src="{{ asset($registro->anexo) }}" alt="" width="950" height="400"> --}}
                        <p style= "font-size:90%;text-align:justify;">Descrição: {{ $registro->user_description ?? 'Não concluída'}}</p>
                    </section>                          
                </div>
            </div>
        </div>
@endsection 
 