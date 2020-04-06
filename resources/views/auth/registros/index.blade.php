@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
	
}

s
</style>
</head>
<body>
<div class="container">
<h2>Configurações do Usuário</h2>

<table>
  <tr>
    <th>Nome</th>
    <th>Cpf</th>
    <th>Administrador?</th>
    <th>E-mail</th>
    <th>Senha</th>
  </tr>
  <tr>
    <td>{{$registro->name}}</td>
    <td>{{$registro->cpf}}</td>
    <td>{{$registro->isAdmin}}</td>
    <td>{{$registro->email}}</td>
    <td>{{$registro->password}}</td>
    <td>
          <a class="btn deep-orange" href="{{ route('auth.registros.editar') }}">Editar</a>
          <a class="btn red" href="{{ route('auth.registros.deletar',$registro->id) }}"onclick="return confirm('Tem certeza que deseja excluir a conta?');">Deletar</a> 
    </td>
   
            
  </tr>
  
</table>
</div>
</body>
</html>


@endsection