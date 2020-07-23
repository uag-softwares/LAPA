@extends('layouts.app')
@section('titulo', 'Editais')
@section('content')
    <div class="container" >
        <h2>Todos os editais</h2>
        <div class="d-flex flex-column">

            @if (count($registros) < 1)
                <p>Ops, ainda não temos nenhum edital</p>
            @else
        
            <div class="d-flex flex-wrap justify-content-center">
                   
                @foreach ($registros as $registro)
                    @include('site.postagens._card')
                @endforeach 

            </div>
            @endif
            
            <div class="d-flex justify-content-center">
                {{ $registros->links() }}
            </div> 
         </div>
    </div>
@endsection 