@php($user = Auth::user())
   @if(@isset($user->avatar))
          <div class="input-field">
             <img src="{{asset($user->avatar) }}" alt="" height="200" width="200">
          </div>    
    @endisset
    <div class="form-group d-flex flex-column align-items-left">
       
       <label for="avatar">{{ __('Foto (opcional)') }}</label>
           <input class="form-control form-control-lg @error('avatar') is-invalid @enderror" id="avatar" type="file" name="avatar">
           @error('avatar')
              <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
           @enderror    
    </div>
    <div class="form-group">
    <label for="name">Nome*</label>
        <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{isset($user->name) ? $user->name : old('name')}}" required autocomplete="name" autofocus placeholder="Ex.:Maria">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
 
    <div class="form-group">
        <label for="cpf">CPF*</label>
        <input id="cpf" type="text" class="cpf form-control form-control-lg @error('cpf') is-invalid @enderror" name="cpf" value="{{isset($user->cpf) ? $user->cpf :old('cpf')}}" required autocomplete="cpf" autofocus placeholder="Ex.: 123.456.789.10"
        {{ Auth::user() ? 'readonly' : '' }}>
         @error('cpf')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">E-mail*</label>
        <input id="email" type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{isset($user->email) ? $user->email: old('email')}}" required autocomplete="email" autofocus placeholder="Ex.: maria@gmail.com"  
        {{ Auth::user() ? 'readonly' : '' }}>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
    <label for="user_description">Descrição Profissional(Opcional)</label>
        <textarea id="user_description" class="form-control form-control-lg @error('user_description') is-invalid @enderror" type="text" name="user_description" autofocus placeholder="Descreva aqui sobre sua vida profissional e área de atuação(etc).">{{ isset($user->user_description ) ? $user->user_description  : old('user_description ') }}</textarea>

        @error('user_description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

   <div class="form-group">
    <label for="link_lattes">Link do Lattes(Opcional)</label>
        <input id="link_lattes" type="text" class="form-control form-control-lg @error('link_lattes') is-invalid @enderror" name="link_lattes" value="{{isset($user->link_lattes) ? $user->link_lattes : old('link_lattes')}}"  autofocus placeholder="Adicione aqui o link do seu currículo lattes">
        @error('link_lattes')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
   @guest
    <div class="form-group">
        <label for="psw">{{ Auth::user() ? 'Senha Atual*' : 'Senha*' }}</label>
        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" value="" required autocomplete="new-password" autofocus placeholder="Use 6 ou mais caracteres com uma combinação de letras maiúsculas e minúsculas,números e símbolos">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="psw-repeat">Confirme a senha*</label>									
        <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" value="{{isset($user->password_confirmation) ? $user->password_confirmation: ''}}" required autocomplete="new-password">
         @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
   </div>
   @endguest
  