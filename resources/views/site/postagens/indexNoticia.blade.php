@extends('layouts.app')
@section('titulo', 'Noticias')
@section('content')
    <div class="container" >
        <h2 class="fadeInDown" data-anime="150">Notícias</h2>
        <div class="d-flex flex-column">

            @if (count($registros) < 1)
                <p>Ops, ainda não temos nenhuma notícia</p>
            @else
        
            <div class="d-flex flex-wrap justify-content-center">
                   
                @foreach ($registros as $registro)
                    @include('site.postagens._card')
                @endforeach 
                  
            </div>
            @endif

            <div class="d-flex justify-content-center fadeInDown" data-anime="300">
                {{ $registros->links() }}
            </div> 
         </div>
    </div>
@endsection 