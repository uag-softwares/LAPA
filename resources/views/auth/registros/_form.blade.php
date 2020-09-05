@php($user = Auth::user())
   @if(@isset($user->avatar))
          <div class="input-field">
             <img src="{{asset($user->avatar) }}" alt="" height="200" width="200">
          </div>    
    @endisset
    <div class="form-group d-flex flex-column align-items-left">
      <div id="radio-group-anexo">
         <label for="avatar">{{ __('Foto (opcional)') }}</label>
              <label class="@error('tipo_avatar') is-invalid @enderror">Escolher origem da imagem anexa*</label><br>
          <input disabled type="radio" name="tipo_avatar" value="upload" id="upload-radio" {{ isset($user) ? ($user->tipo_avatar== 'upload' ? 'checked' : '') : ''}}>
          <label for="upload-radio">Enviar arquivo do dispositivo</label><br>
          <input type="radio" name="tipo_avatar" value="link_drive" id="drive-radio" {{ isset($user) ? ($user->tipo_avatar== 'link_drive' ? 'checked' : '') : '' }}>
          <label for="drive-radio">Link compartilhado do Google Drive</label><br>
          <input type="radio" name="tipo_avatar" value="link_web" id="web-radio" {{ isset($user) ? ($user->tipo_avatar == 'link_web' ? 'checked' : '') : '' }}>
          <label for="web-radio">Link da imagem da web</label>
          @error('tipo_avatar')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div> 
    </div>
    <div class="form-group form-group-anime {{ isset($user) ? 'show' : '' }}">
    <label id="upload" class="file-input w-100 input-anime {{ isset($user) ? ($user->tipo_avatar == 'upload' ? 'show' : '') : '' }}" for="avatar">
        <div class="d-flex flex-column text-center border rounded bg-white">
            <div class="file-header">
                <img height="200px" id="img-foto" src="{{ asset($user->avatar ?? asset('img/file-image.svg')) }}" alt="" style="max-height: 200px">
            </div>
            <div class="file-label">
                <p>Escolher uma imagem jpeg, jpg, png ou gif.</p>
            </div>
        </div>
        <input id="avatar" class="d-none form-control form-control-lg @error('avatar') is-invalid @enderror" type="file" name="anexo_upload" placeholder="Escolha um arquivo jpeg, jpg, png ou gif" onchange="document.getElementById('img-foto').src = window.URL.createObjectURL(this.files[0])">
    </label>
    <div id="link_drive"  class="drive-input input-anime {{ isset($user) ? ($user->tipo_avatar == 'link_drive' ? 'show' : '') : '' }}">
        <label>Link da imagem do Google Drive*</label>
        <input type="text" class="form-control form-control-lg @error('avatar') is-invalid @enderror" name="anexo_drive" placeholder="A imagem deve ser no formato jpeg, jpg, png ou gif." value="{{ isset($user->avatar) ? $user->avatar : old('avatar') }}">
        <p class="info">*O link é obtido na opção "Gerar link compartilhável" pelo Google Drive e deve ter a permissão "Visível a qualquer pessoa com link".</p>
    </div>
    <div id="link_web" class="web-link input-anime {{ isset($user) ? ($user->tipo_avatar == 'link_web' ? 'show' : '') : '' }}">
        <label>Link da imagem da web</label>
        <input type="text" class="form-control form-control-lg @error('avatar') is-invalid @enderror" name="anexo_web" placeholder="A imagem deve ser no formato jpeg, jpg, png ou gif." value="{{ isset($user->avatar) ? $user->avatar : old('avatar') }}">
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
        <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" value="{{isset($user->password_confirmation) ? $user->password_confirmation: ''}}" required autocomplete="new-password">
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
  