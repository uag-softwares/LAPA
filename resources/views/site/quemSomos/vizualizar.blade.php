@extends('layouts.app')

@section('titulo', 'Professores')
@section('content')
    <div class="container" >
        
        <div class="breadcrumbs d-flex text-left justify-content-sm-start justify-content-between">
            <h2>Perfil Profissional</h2>
        </div>
            <div class="card-body d-flex flex-column align-items-center">
                 <section>
                     <h1 class="mb-4">{{ $registro->name}} {{ $registro->surname}}</h1>
                     <article>
                        <img class="img-fluid mb-4" src="{{ asset($registro->avatar) }}" alt="" style="max-height: 400px">
                        <p class="text">Email:
                           <a href = "mailto:{{ $registro->email}}">{{ $registro->email}}</a> 
                        </p>
                        <p class="text">Lattes:
                            <a href = "{{ $registro->link_lattes}}"target="_blank" rel="noopener noreferrer">{{$registro->link_lattes}}</a></p>
                        <p class="text">Perfil Profissional: {{ $registro->user_description}}</p> 
                      </article>  
                 </section>                          
           </div>
           
    </div>
@endsection 
 