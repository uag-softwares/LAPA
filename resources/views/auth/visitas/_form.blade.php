
<div class="form-group">
    <h4><b>Informações do responsável pela visita</b></h4>
    <div class="form-group">
        <label for="name">Nome*</label>
        <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{isset($userExiste->name) ? $userExiste->name : old('name')}}" required autocomplete="name" autofocus
        {{ isset($userExiste->name) ? 'readonly' : ''}}>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="cpf">CPF*</label>
        <input id="cpf" type="text" class="cpf form-control form-control-lg @error('cpf') is-invalid @enderror" name="cpf" value="{{isset($userExiste->cpf) ? $userExiste->cpf :old('cpf')}}" required autocomplete="cpf" autofocus placeholder="Ex.: 123.456.789.10"
        {{ isset($userExiste->cpf) ? 'readonly' : ''}}>
            @error('cpf')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">E-mail*</label>
        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{isset($email) ? $email: old('email')}}" required autocomplete="email" autofocus placeholder="exemplo@exemplo.com"
        {{ isset($email) ? 'readonly' : ''}}>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="telephone">Telefone*</label>
        <input id="telephone" type="text" class="telefone form-control form-control-lg @error('telephone') is-invalid @enderror" name="telephone" value="{{isset($userExiste->telephone) ? $userExiste->telephone: old('telephone')}}" required autofocus placeholder="Ex. (81)99999-9999">
        @error('telephone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <h4><b>Informações da visita</b></h4>
</div>
<div class="form-group">
    <label for="data">Data*</label>
    <input id="data" type="text" name="data" class="datepicker form-control form-control-lg {{ $errors->has('g-recaptcha-response') || $errors->has('data') ? 'is-invalid' : '' }}" data-provide="datepicker" value="{{ isset($registro->data) ? $registro->data : old('data') }}" placeholder="Ex.: 01/01/2019" required>
    @error('data')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group d-flex flex-row">
    <div class="form-group mr-5 w-100">
        <label for="hora_inicial">Hora de início*</label>
        <select disabled name="hora_inicial" id="hora_inicial" class="custom-select custom-select-lg {{ $errors->has('g-recaptcha-response') || $errors->has('hora_inicial') || $errors->has('hora') ? 'is-invalid' : '' }}"></select>
        @error('hora_inicial')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        @error('hora')
            <input type="hidden" class="is-invalid">
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group w-100">
        <label for="hora_final">Hora de fim*</label>
        <select disabled name="hora_final" id="hora_final" class="custom-select custom-select-lg {{ $errors->has('g-recaptcha-response') || $errors->has('hora_final') || $errors->has('hora') ? 'is-invalid' : '' }}"></select>
        @error('hora_final')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="descricao">Descrição*</label>
    <textarea name="descricao" class="form-control form-control-lg @error('descricao') is-invalid @enderror" type="text" placeholder="Descreva brevemente sua visita" required>{{ isset($registro->descricao) ? $registro->descricao : old('descricao') }}</textarea>
    @error('descricao')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">	
    <div class="g-recaptcha{{$errors->has('g-recaptcha-response') ? ' has-error' : '' }}" data-sitekey="{{ env('NOCAPTCHA_SITEKEY') }}"></div>
         @if ($errors->has('g-recaptcha-response'))
            		    
              <span class="invalid-feedback" style="display: block;">
                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
              </span>
                          
        @endif
</div>
@if (Auth::user()) 
<label class="input-checkbox d-flex justify-content-start" for="confirmada">Criar esta visita já confirmada? &nbsp;
    <input type="checkbox" name="confirmada" {{ isset($registro->confirmada) && $registro->confirmada == true ? 'checked' : ''}} value="true">
    <span class="checkmark"></span>
</label>

@error('confirmada')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
@enderror

<div class="justify-content-center">
    <p>Agendando uma visita você concorda com nossos <a href="{{ route('termo.privacidade') }}">Termos & Privacidade</a>.</p>
</div>
@endif

