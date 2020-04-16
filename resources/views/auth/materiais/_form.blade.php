<div class="form-group">
    <label for="titulo">Título do Material</label>
    <input class="form-control form-control-lg @error('titulo') is-invalid @enderror" type="text" name="titulo" value="{{ isset($registro->titulo) ? $registro->titulo : old('titulo') }}" placeholder="Digite aqui o titulo do material">
    @error('titulo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="texto">Texto</label>
    <textarea class="form-control form-control-lg @error('texto') is-invalid @enderror" type="text" name="texto" placeholder="Escreva informações sobre seu material">{{ isset($registro->texto) ? $registro->texto : old('texto') }}</textarea>
    @error('texto')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="nome">Anexo</label>
    <input class="form-control form-control-lg" type="file" name="anexo" >
    @if(@isset($registro->anexo))
    <div class="form-group">
        <img src="{{ asset($registro->anexo) }}" alt="">
    </div>    
@endisset
</div>
<div class="form-group">
    <label for="user_id">Selecione a disciplina</label>
    <select class="form-control form-control-lg" name="disciplina_id" id="disciplinas">
        <option hidden disabled selected value>{{ __('Selecione uma disciplina') }}</option>
        @foreach($disciplinas as $disciplina)
            @if(isset($registro->disciplina->id) && $disciplina->id = $registro->disciplina->id)
                <option value="{{ $disciplina->id }}" selected>{{ $disciplina->nome}}</option>
            @else
                <option value="{{ $disciplina->id }}">{{ $disciplina->nome}}</option>
            @endif
        @endforeach
    </select>
</div>


