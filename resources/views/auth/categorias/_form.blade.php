<div class="form-group">
    <label for="nome">Nome da categoria</label>
    <input class="form-control form-control-lg @error('nome') is-invalid @enderror" type="text" name="nome" value="{{ isset($registro->nome) ? $registro->nome : old('nome') }}" placeholder="Digite aqui o nome da categoria">
    @error('nome')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="disciplina_id">Selecione a disciplina</label>
    <select class="form-control form-control-lg @error('disciplina_id') is-invalid @enderror" name="disciplina_id" id="disciplinas">
        <option disabled selected value>{{ __('Selecione uma disciplina') }}</option>
        @foreach($disciplinas as $disciplina)
            @if(isset($registro->disciplina->id) && $disciplina->id == $registro->disciplina->id)
                <option value="{{ $disciplina->id }}" selected>{{ $disciplina->nome }}</option>
            @else
                <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
            @endif
        @endforeach
    </select>
    @error('disciplina_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
