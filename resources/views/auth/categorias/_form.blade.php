<div class="form-group">
    <label for="nome">Nome da categoria</label>
    <input class="form-control form-control-lg @error('nome') is-invalid @enderror" type="text" name="nome" value="{{ isset($registro->nome) ? $registro->nome : old('nome') }}" placeholder="Digite aqui o nome da categoria">
    @error('nome')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
