@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
<style>

/* Set a style for the submit button */
.updatebtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  font-size: 18px;
  
}

.updatebtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.update{
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>


<form method="POST" action="{{ route('auth.registros.atualizar')}}">
  @csrf
  <div class="container">
    <h1>Editar Informações</h1>
    
    <hr>
    <input type="hidden"  name="_method" value="PUT">
    
    @include('auth.registros._form')
    </hr>
    <button type="submit" class="updatebtn">Editar</button>
  </div>
  

</form>

</html>



            
   
@endsection
