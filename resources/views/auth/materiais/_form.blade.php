@if ($errors->any())
    <p class="error">Campos com * são obrigatórios!</p>
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
    <label for="user_id">Selecione a disciplina*</label>
    <select class="custom-select custom-select-lg @error('disciplina_id') is-invalid @enderror" name="disciplina_id" id="disciplinas">
        <option hidden disabled selected value>{{ __('Selecione uma disciplina') }}</option>
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
<label class="input-checkbox" for="publicado">Publicar agora?
    <input type="checkbox" name="publicado" autocomplete="publicado" {{ isset($registro->publicado) && $registro->publicado == true ? 'checked' : ''}} value="true">
    <span class="checkmark"></span>
</label>
<div class="form-group">
     <hr>
      <p>Disciplina não cadastrada? <a class="" href="{{ route('auth.disciplina.adicionar') }}">{{ __('Cadastrar Disciplina') }}</a>.</p>
</div>


