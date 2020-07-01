@extends('layouts.app')
@section('titulo', 'Professores')
@section('content')
    <div class="container" >
        @if(isset($contato->texto))
            <h2>Quem Somos </h2>
            <p> {{ $contato->texto ?? '' }}</p>
        @endif

        <h2>Professores</h2>

            @if (count($registros) < 1)
                <p>Ops, nossos professores ainda não foram cadastrados</p>
            @else
                @foreach ($registros as $registro)
                    <div class="d-flex mx-auto text-left shadow-sm mb-3" id="usuarios" style="max-width: 500px;">
                        <div class="d-block my-auto mx-4 w-75" style="overflow: hidden;">
                            <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                <a href="{{ route('site.contato.vizualizar', $registro->slug) }}">
                                    {{$registro->name}}
                                </a>
                            </p>
                            <p class="m-0 mt-auto" style="white-space: nowrap; font-size: 12px; overflow: hidden; text-overflow: ellipsis;">
                                E-mail: <a href = "mailto:{{ $registro->email}}">{{ $registro->email}}</a> 
                            </p>
                        </div>
                        <div class="rounded-right" style="display: flex; justify-content: center; align-items: center; width: 5em; height: 5em; background-image: url('{{ asset($registro->avatar) }}'); background-position: center; background-size: cover;">
                            {!! isset($registro->avatar) ? '' : '<div class="fas fa-user" style="color: #00ad50; font-size: 5rem;"></div>' !!}
                        </div>
                    </div>
                @endforeach
            @endif
            
    </div>
@endsection 


