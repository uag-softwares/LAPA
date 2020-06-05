@extends('layouts.app')

@section('titulo', 'Professores')
@section('content')
    <div class="container" >
        
        <h2>Perfil Profissional</h2>
            <div class="row justify-content-center">
                <div class="col-11 col-md-8 col-lg-6 p-4 border rounded">
                    <section>
                        <h1 class="mb-4">{{ $registro->name}} {{ $registro->surname}}</h1>
                        <article>
                            <img class="img-fluid mb-4" src="{{ asset($registro->avatar) }}" alt="" style="max-height: 400px">
                            <p class="text">Email:
                            <a href = "mailto:{{ $registro->email}}">{{ $registro->email}}</a> 
                            </p>
                            {!! isset($registro->link_lattes) ? '<p class="text">Lattes: <a href = "{{ $registro->link_lattes }}" target="_blank" rel="noopener noreferrer">{{$registro->link_lattes}}</a></p>' : '' !!}
                            <p class="text">Perfil profissional: {{ $registro->user_description}}</p> 
                        </article>  
                    </section>                          
                </div>
            </div>
           
    </div>
@endsection 
 