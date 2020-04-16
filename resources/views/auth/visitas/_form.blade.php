<div class="form-group">
    <label for="responsavel">Nome completo do responsável</label>
    <input class="form-control form-control-lg @error('responsavel') is-invalid @enderror" type="text" name="responsavel" value="{{ isset($registro->responsavel) ? $registro->responsavel : old('responsavel') }}" placeholder="Digite aqui o seu nome completo">
    @error('responsavel')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="d-flex flex-row">
    <div class="form-group mr-5">
        <label for="data">Data da visita</label>
        <input min="{{ date('Y-m-d', strtotime('tomorrow')) }}" class="form-control form-control-lg @error('data') is-invalid @enderror" type="date" name="data" value="{{ isset($registro->data) ? $registro->data : old('data') }}" placeholder="Digite a data da visita">
        @error('data')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group mr-5">
        <label for="hora">Hora de início da visita</label>
        <input min="{{ date('H:i', strtotime('09:00')) }}" max="{{ date('H:i', strtotime('15:00')) }}" class="form-control form-control-lg @error('hora_inicial') is-invalid @enderror" type="time" name="hora_inicial" value="{{ isset($registro->hora_inicial) ? $registro->hora_inicial : old('hora_inicial') }}" placeholder="Digite a hora do início da visita">
        @error('hora_inicial')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group mr-5">
        <label for="hora">Hora de fim da visita</label>
        <input min="{{ date('H:i', strtotime('09:00')) }}" max="{{ date('H:i', strtotime('15:00')) }}" class="form-control form-control-lg @error('hora_final') is-invalid @enderror" type="time" name="hora_final" value="{{ isset($registro->hora_final) ? $registro->hora_final : old('hora_final') }}" placeholder="Digite a hora do fim da visita">
        @error('hora_final')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group">
    <label for="descricao">Descrição da visita</label>
    <textarea name="descricao" id="descricao" class="form-control form-control-lg @error('descricao') is-invalid @enderror" type="text" placeholder="Descreva aqui a sua visita">{{ isset($registro->descricao) ? $registro->descricao : old('descricao') }}</textarea>
    @error('descricao')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="telefone">Telefone</label>
    <input class="form-control form-control-lg @error('telefone') is-invalid @enderror" type="text" name="telefone" value="{{ isset($registro->telefone) ? $registro->telefone : old('telefone') }}" placeholder="Digite o seu número de telefone">
    @error('telefone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" value="{{ isset($registro->email) ? $registro->email : old('email') }}" placeholder="Digite o seu email">
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<label class="input-checkbox d-flex justify-content-start" for="confirmada">Confirmar visita?
    <input type="checkbox" name="confirmada" {{ isset($registro->confirmada) && $registro->confirmada == true ? 'checked' : ''}} value="true">
    <span class="checkmark"></span>
</label>