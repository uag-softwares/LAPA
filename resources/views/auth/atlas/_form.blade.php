<div class="form-group">
    <label for="titulo">Título do atla*</label>
    <input class="form-control form-control-lg @error('titulo') is-invalid @enderror" type="text" name="titulo" value="{{ isset($registro->titulo) ? $registro->titulo : old('titulo') }}" placeholder="Digite aqui o titulo deste atla">
    @error('titulo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="descricao">Descrição*</label>
    <textarea class="form-control form-control-lg @error('descricao') is-invalid @enderror" type="text" name="descricao" placeholder="Descreva aqui a descrição deste atla">{{ isset($registro->descricao) ? $registro->descricao : old('descricao') }}</textarea>
    @error('descricao')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="categoria_id">Selecione a categoria*</label>
    <select class="form-control form-control-lg @error('categoria_id') is-invalid @enderror" name="categoria_id" id="categorias">
        <option hidden disabled selected value>{{ __('Selecione uma categoria') }}</option>
        @foreach($categorias as $categoria)
            @if(isset($registro->categoria->id) && $categoria->id == $registro->categoria->id)
                <option value="{{ $categoria->id }}" selected>{{ $categoria->nome }}</option>
            @else
                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
            @endif
        @endforeach
    </select>
    @error('categoria_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="nome">Anexo</label>
    <input class="form-control form-control-lg" type="file" name="anexo">
</div>

@if(@isset($registro->anexo))
    <div class="form-group">
        <img src="{{ asset($registro->anexo) }}" alt="">
    </div>    
@endisset
<label class="input-checkbox" for="publicado">Publicar agora?
    <input type="checkbox" name="publicado" {{ isset($registro->publicado) && $registro->publicado == true ? 'checked' : ''}} value="true">
    <span class="checkmark"></span>
</label>