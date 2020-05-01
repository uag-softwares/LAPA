@extends('layouts.app')

@section('titulo', 'Professores')
@section('content')
    <div class="container" >
        <h2>Perfil Profissional</h2>
        <div class="breadcrumbs d-flex text-left justify-content-sm-start justify-content-between">
            <p>
                <a href="{{ route('site.postagens.home') }}">Início</a> /
                Eventos
            </p>
        </div>
             <div class="card-body d-flex flex-column align-items-justify">
                  <section>
                          <h2 style= "font-size:120%;text-align:justify;">{{ $registro->name}} {{ $registro->surname}}</h2>
                               <br><p style= "font-size:90%;text-align:justify;">E-mail: {{ $registro->email}}</p></br>
                               <!--<br><img src="{{ asset($registro->anexo) }}" alt="" width="950" height="400"></img></br> -->
			       <br><p style= "font-size:90%;text-align:justify;">Perfil Profissional: {{ $registro->user_description}}</p></br>
                               
                          
                         
                   </section>                          
            </div>
           
    </div>
@endsection 
 