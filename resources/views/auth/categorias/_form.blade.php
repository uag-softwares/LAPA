@if ($errors->any())
    <p class="error">Campos com * são obrigatórios!</p>
@endif
<div class="form-group">
    <label for="nome">Nome da categoria*</label>
    <input {{ isset($registro->nome) ? 'readonly' : '' }} class="form-control form-control-lg @error('nome') is-invalid @enderror" type="text" name="nome" value="{{ isset($registro->nome) ? 
																			$registro->nome : old('nome') }}" placeholder="ex:Sistema Nervoso">
    @error('nome')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="disciplina_id">Selecione a disciplina*</label>
    <select class="custom-select custom-select-lg @error('disciplina_id') is-invalid @enderror" name="disciplina_id" id="disciplinas">
        <option disabled selected value>{{ __('Clique para selecionar disciplina') }}</option>
        @foreach($disciplinas as $disciplina)
            @if(isset($registro->disciplina->id) && $disciplina->id == $registro->disciplina->id)
                <option value="{{ $disciplina->id }}" selected>{{ ucfirst($disciplina->nome) }}</option>
            @else
                <option value="{{ $disciplina->id }}">{{ ucfirst($disciplina->nome) }}</option>
            @endif
        @endforeach
    </select>
    @error('disciplina_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
