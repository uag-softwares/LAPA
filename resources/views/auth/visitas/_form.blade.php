
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
        <label for="surname">Sobrenome*</label>
        <input id="surname" type="text" class="form-control form-control-lg @error('surname') is-invalid @enderror" name="surname" value="{{isset($userExiste->surname) ? $userExiste->surname : old('surname')}}" required autocomplete="surname" autofocus
        {{ isset($userExiste->surname) ? 'readonly' : ''}}>
        @error('surname')
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
        <input id="telephone" type="text" class="telefone form-control form-control-lg @error('telephone') is-invalid @enderror" name="telephone" value="{{isset($userExiste->telephone) ? $userExiste->telephone: old('telephone')}}" required autofocus placeholder="(99)99999-9999">
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
    <input min="{{ date('Y-m-d', strtotime('tomorrow')) }}" class="form-control form-control-lg @error('data') is-invalid @enderror" type="date" name="data" value="{{ isset($registro->data) ? $registro->data : old('data') }}" placeholder="Digite a data da visita" required>
    @error('data')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="d-flex flex-row">
    <div class="form-group mr-5 w-100">
        <label for="hora">Hora de início*</label>
        <input min="{{ date('H:i', strtotime('09:00')) }}" max="{{ date('H:i', strtotime('15:00')) }}" class="form-control form-control-lg @error('hora_inicial') is-invalid @enderror" type="time" name="hora_inicial" value="{{ isset($registro->hora_inicial) ? $registro->hora_inicial : old('hora_inicial') }}" placeholder="Digite a hora do início da visita" required>
        @error('hora_inicial')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group w-100">
        <label for="hora">Hora de fim*</label>
        <input min="{{ date('H:i', strtotime('09:00')) }}" max="{{ date('H:i', strtotime('15:00')) }}" class="form-control form-control-lg @error('hora_final') is-invalid @enderror" type="time" name="hora_final" value="{{ isset($registro->hora_final) ? $registro->hora_final : old('hora_final') }}" placeholder="Digite a hora do fim da visita" required>
        @error('hora_final')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group">
    <label for="descricao">Descrição*</label>
    <textarea name="descricao" class="form-control form-control-lg @error('descricao') is-invalid @enderror" type="text" placeholder="Descreva aqui a sua visita" required>{{ isset($registro->descricao) ? $registro->descricao : old('descricao') }}</textarea>
    @error('descricao')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group{{$errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
     {!! app('captcha')->display() !!}
     @if ($errors->has('g-recaptcha-response'))
         <span class="invalid-feedback" style="display: block;">
              <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
         </span>
    @endif
    {!! NoCaptcha::renderJs() !!}
</div>
<div class="justify-content-center">
 <p>Agendando uma visita você concorda com nossos <a href="{{ route('termo.privacidade') }}">Termos & Privacidade</a>.</p>
</div>
@if (Auth::user()) 
<label class="input-checkbox d-flex justify-content-start" for="confirmada">Confirmar visita?
    <input type="checkbox" name="confirmada" {{ isset($registro->confirmada) && $registro->confirmada == true ? 'checked' : ''}} value="true">
    <span class="checkmark"></span>
</label>
@error('confirmada')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
@enderror
@endif

