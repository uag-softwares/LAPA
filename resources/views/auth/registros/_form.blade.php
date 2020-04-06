<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}



</style>
</head>
<body>
<label for="name"><b>Nome</b></label>
    <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{isset($usuario->name) ? $usuario->name : ''}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    </div>
    <label for="cpf"><b>Cpf</b></label>
    <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{isset($usuario->cpf) ? $usuario->cpf : ''}}" required autocomplete="cpf" autofocus>

                                @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    </div>
    
    <label for="email"><b>E-mail</b></label>
    <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{isset($usuario->email) ? $usuario->email: ''}}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    </div>
    <label for="psw"><b>Senha</b></label>
    <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{isset($usuario->password) ? $usuario->password: ''}}" required autocomplete="new-password">

                                @error('Senha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    </div>

    <label for="psw-repeat"><b>Confirme a senha</b></label>									
   <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{isset($usuario->password_confirmation) ? $usuario->password_confirmation: ''}}" required autocomplete="new-password">
   </div>
   <div class="form-group{{ $errors->has('isAdmin') ? ' has-error' : '' }}">
    			    <label for="adm"><b>Administrador?</b></label>
    			     <select class="form-control" name="isAdmin" id="isAdmin">
        	            	 <option value="1" @if (old('active') == 1) selected @endif>Sim</option>
        	             	 <option value="0" @if (old('active') == 0) selected @endif>Não</option>
    			    </select>
    </div>
</body>
</html>