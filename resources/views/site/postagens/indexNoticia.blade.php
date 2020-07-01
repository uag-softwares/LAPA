@extends('layouts.app')
@section('titulo', 'Noticias')
@section('content')
    <div class="container" >
        <h2>Todas as notícias</h2>
        <div class="d-flex justify-content-around row">

            @if (count($registros) < 1)
                <p>Ops, ainda não temos nenhuma notícia</p>
            @else
        
            <div class="d-flex flex-wrap justify-content-center">
                   
                @foreach ($registros as $registro)
                    @include('site.postagens._card')
                @endforeach 
                  
                <div class="d-flex justify-content-center">
                    {{ $registros->links() }}
                </div> 
                            
            </div>
            @endif
         </div>
    </div>
@endsection 