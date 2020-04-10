    @php($user = Auth::user())
    <div class="form-group">
    <label for="name">Nome*</label>
        <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{isset($user->name) ? $user->name : old('name')}}" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="cpf">CPF*</label>
        <input id="cpf" type="text" class="form-control form-control-lg @error('cpf') is-invalid @enderror" name="cpf" value="{{isset($user->cpf) ? $user->cpf :old('cpf')}}" required autocomplete="cpf" autofocus
        {{ Auth::user() ? 'readonly' : '' }}>
         @error('cpf')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">E-mail*</label>
        <input id="email" type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{isset($user->email) ? $user->email: old('email')}}" required autocomplete="email" autofocus  
        {{ Auth::user() ? 'readonly' : '' }}>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="psw">{{ Auth::user() ? 'Senha Atual*' : 'Senha*' }}</label>
        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" value="" required autocomplete="new-password">
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
   <div class="form-group {{ $errors->has('isAdmin') ? ' has-error' : '' }}">
        <label for="adm">Administrador?</label>
          <select class="form-control form-control-lg" name="isAdmin" id="isAdmin">
                <option value="1" @if (old('active') == 1) selected @endif>Sim</option>
                <option value="0" @if (old('active') == 0) selected @endif>Não</option>
        </select>
    </div>