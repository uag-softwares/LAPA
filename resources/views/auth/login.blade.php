@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;
 
  box-sizing: border-box;
  background-color:white;
  height: 400px;
  width: 40%;
  position:fixed;
  right: 30%;
  margin-bottom: 100px;
  text-align:middle;
  
}
input[type=text], input[type=password], input[type=email]{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

button:hover {
  opacity: 0.8;
}


.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
 
}
</style>
</head>
<body>


     
            <div class="card">
		 <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
			
                      
			<div class="container">
                            <h2>Login</h2>
                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('E-mail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       
			
                           

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Senha" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" >

                                @error('Senha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                      
                            
                             <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Lembrar sessão?') }}
                                    </label>
                                </div>
                           
			     <div class="container" style="background-color:#red">

					@if (Route::has('password.request'))
                                    		<a class="btn btn-link" href="{{ route('password.request') }}">
                                        	{{ __('Esqueceu a Senha?') }}
                                    		</a>
                               		@endif
			     </div>
			
                             <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
				
			     </div>
  		      </div>
		      <div class="container" style="background-color:#f1f1f1">
    				 @if (Route::has('register'))
                               
                                    <a class="btn btn-link" href="{{ route('register') }}">{{ __('Criar conta') }}</a>
                              
                               @endif
 		      </div>

		    </form>
	    	</div>
	    </div>
	
</div>

 
</body>
</html>
@endsection