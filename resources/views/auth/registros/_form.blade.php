@php
$user = Auth::user()
@endphp
   @if(isset($user->avatar))
          <div class="input-field">
             <img id="img-foto" src="{{asset($user->avatar) }}" alt="" height="200" width="200">
          </div>    
    @endisset
    <div class="form-group d-flex flex-column align-items-left">
        <div id="radio-group-anexo">
            <label class="@error('tipo_avatar') is-invalid @enderror @error('anexo_web') is-invalid @enderror @error('anexo_drive') is-invalid @enderror @error('anexo_upload') is-invalid @enderror">Escolher foto do perfil</label><br>
            <input type="radio" name="tipo_avatar" value="upload" id="upload-radio" {{ isset($user) ? ($user->tipo_avatar== 'upload' ? 'checked' : '') : ''}}>
            <label for="upload-radio">Enviar arquivo do dispositivo</label><br>
            @if($errors->first('tipo_avatar') || $errors->first('anexo_upload') || $errors->first('anexo_drive') || $errors->first('anexo_web'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('tipo_avatar') | $errors->first('anexo_upload') | $errors->first('anexo_drive') | $errors->first('anexo_web')}}</strong>
                </span>
            @endif
        </div> 
    </div>
    <div class="form-group form-group-anime user {{ isset($user) ? 'show' : '' }}">
        <div id="upload" class="upload input-anime {{ isset($user) ? 'show' : '' }}">
            <label>Enviar arquivo de foto do perfil</label>
            <input class="form-control form-control-lg" type="file" name="anexo_upload" placeholder="Escolha um arquivo jpeg, jpg, png ou gif" onchange="document.getElementById('img-foto').src = window.URL.createObjectURL(this.files[0])">
        </div>
        <div id="link_drive"  class="drive-input input-anime {{ isset($user) ? ($user->tipo_avatar == 'link_drive' ? 'show' : '') : '' }}">
            <label>Link da imagem do Google Drive</label>
            <input type="text" class="form-control form-control-lg" name="anexo_drive" placeholder="A imagem deve ser no formato jpeg, jpg, png ou gif." value="{{ isset($registro->tipo_avatar) && $registro->tipo_avatar == 'link_drive' ? $user->avatar : old('avatar') }}">
            <p class="info">*O link é obtido na opção "Gerar link compartilhável" pelo Google Drive e deve ter a permissão "Visível a qualquer pessoa com link".</p>
        </div>
        <div id="link_web" class="web-link input-anime {{ isset($user) ? ($user->tipo_avatar == 'link_web' ? 'show' : '') : '' }}">
            <label>Link da imagem da web</label>
            <input type="text" class="form-control form-control-lg" name="anexo_web" placeholder="A imagem deve ser no formato jpeg, jpg, png ou gif." value="{{ isset($registro->tipo_anexo) && $registro->tipo_anexo == 'link_web' ? $user->avatar : old('avatar') }}">
        </div>     
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
        <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" value="{{isset($user->password_confirmation) ? $user->password_confirmation : '' }}" required autocomplete="new-password">
         @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
   </div>
   @endguest
   @section('scripts')
  <!-- Script de mostrar/esconder campos de anexos -->
  <script src="{{ asset('js/toggle_anexo_input.js') }}"></script>

@endsection
  