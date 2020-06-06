@extends('layouts.app')
@section('titulo', 'Eventos')
@section('content')
    <div class="container" >
        <h2>Todos os eventos</h2>

        <div class="d-flex justify-content-around row">

            @if (count($registros) < 1)
                <p>Ops, ainda não temos nenhum evento</p>
            @else
        
            <div class="d-flex flex-wrap justify-content-center">
                   
                @foreach ($registros as $registro)
                    <div class="col-10 col-md-5 col-lg-3 mb-2">
                        <div class="card home">
                            <div class="card-header">
                                    <img src="{{ asset($registro->anexo ?? '/img/lapa-logo.png') }}" alt="{{ $registro->titulo }}">
                            </div>
                            <div class="card-body">
                                    <h5>
                                        <a href="{{ route('site.eventos.vizualizar', $registro->slug) }}">
                                            {{$registro->titulo}} 
                                        </a>
                                    </h5>
                                    {!! strip_tags($registro->descricao) !!}
                            </div>
                            <div class="card-footer">
                                    <span class="fas fa-calendar-alt"></span>
                                    Data do evento: {{ date('d/m/Y', strtotime($registro->data)) }} às {{ date('H:i', strtotime($registro->hora)) }}
                            </div>
                            <div class="card-footer">
                                    Publicado {{ date('d/m/Y', strtotime($registro->created_at)) }} às {{ date('H:i', strtotime($registro->created_at)) }}
                            </div>
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