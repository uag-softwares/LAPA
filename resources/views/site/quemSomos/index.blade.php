@extends('layouts.app')
@section('titulo', 'Professores')
@section('content')
    <div class="container" >
        <h2>Professores</h2>

        <div class="d-flex justify-content-around row">

            @if (count($registros) < 1)
                <p>Ops, ainda não temos professores cadastrados</p>
            @else
        
            <div class="row col-12 justify-content-center">
                   
                  @foreach ($registros as $registro)
                       <div class="col-11 col-md-5 col-lg-4 m-2 px-5 shadow-sm border rounded">
                            <!--<img src="{{ asset($registro->anexo) }}" alt="" width="200" height="100"></img> -->
                            <p class="text mt-3 mb-0"> 
                                <a href="{{ route('site.quemSomos.vizualizar', $registro->id) }}">
                                    {{$registro->name}}
                                </a>
                            </p>
                            <p class="text-footer">E-mail: {{$registro->email}}</li>
                        </div>
                  @endforeach       
                              
                  
            </div>
            @endif
         </div>
    </div>
@endsection 


