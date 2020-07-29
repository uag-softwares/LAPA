@if(isset($registro))
    <p>Essa página de material está <strong>{{ $registro->publicado ? 'publicada' : 'salva no rascunho' }}.</strong></p>
@endif
<div class="form-group">
    <label for="titulo">Título do Material*</label>
    <input class="form-control form-control-lg @error('titulo') is-invalid @enderror" type="text" name="titulo" value="{{ isset($registro->titulo) ? $registro->titulo : old('titulo') }}" placeholder="Ex.: Anatomia de mamíferos">
    @error('titulo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="texto">Texto*</label>
    <textarea id="summernote" class="form-control form-control-lg @error('texto') is-invalid @enderror" type="text" name="texto" placeholder="Ex.: Texto explicativo sobre o que foi mencionado no título.">{{ isset($registro->texto) ? $registro->texto : old('texto') }}</textarea>
    @error('texto')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="nome">Anexo</label>
    <input class="form-control form-control-lg @error('anexo') is-invalid @enderror" id="anexo" type="file" name="anexo"  autocomplete="anexo">
    @error('anexo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
@if(@isset($registro->anexo))
    <div class="form-group">
        <img class="w-50" src="{{ asset($registro->anexo) }}" alt="">
    </div>    
@endisset

<div class="form-group">
    <label for="user_id">Selecione o assunto*</label>
    <select class="custom-select custom-select-lg @error('disciplina_id') is-invalid @enderror" name="disciplina_id" id="disciplinas">
        <option hidden disabled selected value>{{ __('Selecione um assunto') }}</option>
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
<div class="form-group">
     <hr>
      <p>Assunto não cadastrado? <a class="" href="{{ route('auth.disciplina.adicionar') }}">{{ __('Cadastrar Assunto') }}</a>.</p>
</div>


