@extends('layouts.app')

@section('titulo', 'Eventos')
@section('content')
    <div class="container" >
        <h2>Evento</h2>
        <div class="breadcrumbs d-flex text-left justify-content-sm-start justify-content-between">
            <p>
                <a href="{{ route('site.postagens.home') }}">Início</a> /
                Eventos
            </p>
        </div>
             <div class="card-body d-flex flex-column align-items-center">
                  <section>
                          <h1 class="page-header">{{ $registro->titulo}}</h1>
                          <article>
                               <br><img src="{{ asset($registro->anexo) }}" alt="" width="950" height="400"></img></br>
			       <br><p style= "font-size:90%;text-align:justify;">{{ $registro->descricao}}</p></br>
                               <p3 style="font-size:60%;">Publicado por {{ isset($registro->user) ? $registro->user->name : '' }} as {{ $registro->created_at }}</p3>
                          
                         </article>
                   </section>                          
            </div>
           
    </div>
@endsection 
 