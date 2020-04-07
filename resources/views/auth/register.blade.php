@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
<style>

/* Set a style for the submit button */
.registerbtn {
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

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>


<form method="POST" action="{{ route('register') }}">
  @csrf
  <div class="container">
    <h1>Cadastro</h1>
    <p>Por favor preencha o formulário para criar uma conta.</p>
    <hr>

    @include('auth.registros._form')
    <hr>
    <p>Criando uma conta você concorda com nossos <a href="#">Termos & Privacidade</a>.</p>

    <button type="submit" class="registerbtn">Cadastrar</button>
  </div>
  
  <div class="container signin">
    @if (Route::has('register'))
            <p>Já possui uma conta? <a class="btn btn-link" href="{{ route('login') }}">{{ __('Acessar conta') }}</a>.</p>
                
                              
    @endif
    
  </div>
</form>

</html>



            
   
@endsection
