@extends('layouts.app')
@section('titulo', 'Professores')
@section('content')
    <div class="container" >
        
        <div class="breadcrumbs d-flex text-left justify-content-sm-start justify-content-between">
            <h2>Professores</h2>
        </div>
        <div class="d-flex justify-content-around row">

            @if (count($registros) < 1)
                <p>Ops, ainda não temos professores cadastrados</p>
            @else
        
            <div class="item-list">
                   
                  @foreach ($registros as $registro)
                       <dd style="list-style-type: none;">
                          <!--<img src="{{ asset($registro->anexo) }}" alt="" width="200" height="100"></img> -->
                          <li style= "font-size:90%;list-style-type:disc;text-align:left;"> <a href="{{ route('site.quemSomos.vizualizar', $registro->id) }}">
                               {{$registro->name}}</a>
                          </li>
                           <li style="font-size:70%;text-align:left;">E-mail: {{$registro->email}}</li>
                          
                      </dd>
                                          
                  @endforeach       
                              
                  
            </div>
            @endif
         </div>
    </div>
@endsection 


