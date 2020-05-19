@extends('layouts.app')
@section('titulo', 'Editais')
@section('content')
    <div class="container" >
       
        <div class="breadcrumbs d-flex text-left justify-content-sm-start justify-content-between">
            <p>
                 <h2>Lista de Editais</h2>
            </p>
        </div>
        <div class="d-flex justify-content-around row">

            @if (count($registros) < 1)
                <p>Ops, ainda não temos nenhum edital</p>
            @else
        
            <div class="item-list px-4">
                   
                  @foreach ($registros as $registro)
                       <div class="d-block d-md-flex my-3 shadow-sm rounded" id="postagens">
                            <div class="img">
                                <img class="img-fluid rounded" src="{{ asset($registro->anexo) }}" alt="Imagem da postagem">
                            </div>
                            <div class="m-4 text-center text-md-left">
                                <a href="{{ route('site.editais.vizualizar', $registro->slug) }}">
                                    {{$registro->titulo}} 
                                </a>
                                <p style="font-size:70%;">Publicado {{ date('d/m/Y', strtotime($registro->created_at)) }} às {{ date('H:i', strtotime($registro->created_at)) }}</p>
                            </div>
                        </div>                  
                  @endforeach   
                  
                <div class="d-flex justify-content-center">
                    {{ $registros->links() }}
                </div> 
                            
            </div>
            @endif
         </div>
    </div>
@endsection 