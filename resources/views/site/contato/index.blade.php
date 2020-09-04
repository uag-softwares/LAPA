@extends('layouts.app')
@section('titulo', 'Professores')
@section('content')
    <div class="container">
        @if(isset($contato->texto))
            <h2 class="fadeInDown" data-anime="150">Quem Somos </h2>
            <p class="fadeInDown" data-anime="300"> {{ $contato->texto ?? '' }}</p>
        @endif

        <section class="row fadeInDown" data-anime="450">
            <section class="col-sm-12 col-md-6 col-lg-6">
                <h3>Desenvolvido por:</h3>
                <div class="d-flex mx-auto text-left shadow-sm mb-3 usuarios" style="max-width: 500px;">
                    <div class="d-block my-auto mx-4 w-75" style="overflow: hidden;">
                        <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            <a target="_blank" href="http://lattes.cnpq.br/4718404713178825">Íris Viana</a><br>
                        </p>
                        <p class="m-0 mt-auto" style="white-space: nowrap; font-size: 12px; overflow: hidden; text-overflow: ellipsis;">
                            E-mail: <a href = "mailto:vianasantana21@gmail.com">vianasantana21@gmail.com</a> 
                        </p>
                    </div>
                    <div class="rounded-right" style="display: flex; justify-content: center; align-items: center; width: 5em; height: 5em; background-position: center; background-size: cover;">
                        <div class="fas fa-user" style="color: #00ad50; font-size: 5rem;"></div>
                    </div>
                </div>
                <div class="d-flex mx-auto text-left shadow-sm mb-3 usuarios" style="max-width: 500px;">
                    <div class="d-block my-auto mx-4 w-75" style="overflow: hidden;">
                        <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            <a target="_blank" href="http://lattes.cnpq.br/3141289240384782">Raquel Vieira</a><br>
                        </p>
                        <p class="m-0 mt-auto" style="white-space: nowrap; font-size: 12px; overflow: hidden; text-overflow: ellipsis;">
                            E-mail: <a href = "mailto:raquellvieiraa@gmail.com">raquellvieiraa@gmail.com</a> 
                        </p>
                    </div>
                    <div class="rounded-right" style="display: flex; justify-content: center; align-items: center; width: 5em; height: 5em; background-position: center; background-size: cover;">
                        <div class="fas fa-user" style="color: #00ad50; font-size: 5rem;"></div>
                    </div>
                </div>
                <div class="d-flex mx-auto text-left shadow-sm mb-3 usuarios" style="max-width: 500px;">
                    <div class="d-block my-auto mx-4 w-75" style="overflow: hidden;">
                        <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            <a target="_blank" href="http://lattes.cnpq.br/3076429582182777">Vinícius Santos</a><br>
                        </p>
                        <p class="m-0 mt-auto" style="white-space: nowrap; font-size: 12px; overflow: hidden; text-overflow: ellipsis;">
                            E-mail: <a href = "mailto:v.santos0406@gmail.com">v.santos0406@gmail.com</a> 
                        </p>
                    </div>
                    <div class="rounded-right" style="display: flex; justify-content: center; align-items: center; width: 5em; height: 5em; background-position: center; background-size: cover;">
                        <div class="fas fa-user" style="color: #00ad50; font-size: 5rem;"></div>
                    </div>
                </div>
            </section>
            <section class="col-sm-12 col-md-6 col-lg-6">
                <h2 class="mt-2">Equipe de professores:</h2>
        
                @if (count($registros) < 1)
                    <p>Ops, nossos professores ainda não foram cadastrados</p>
                @else
                    @foreach ($registros as $registro)
                        <div class="d-flex mx-auto text-left shadow-sm mb-3 usuarios" style="max-width: 500px;">
                            <div class="d-block my-auto mx-4 w-75" style="overflow: hidden;">
                                <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    <a href="{{ route('site.contato.visualizar', $registro->slug) }}">
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
            </section>
        </section>

        

    </div>

@endsection 


