@extends('layouts.app')

@section('titulo', 'Editar usuário')
@section('content')
<form method="POST" action="{{ route('auth.registros.atualizar')}}">
  @csrf
  <div class="container">
    <h1>Editar Informações</h1>    
    <input type="hidden"  name="_method" value="PUT">

    @include('auth.registros._form')

    <button type="submit" class="btn">Editar</button>
  </div>
  

</form>

</html>



            
   
@endsection
