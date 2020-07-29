@if(isset($registro))
    <p>Essa página do atlas está <strong>{{ $registro->publicado ? 'publicada' : 'salva no rascunho' }}.</strong></p>
@endif

<div class="form-group">
    <label for="titulo">Título da página do atlas*</label>
    <input class="form-control form-control-lg @error('titulo') is-invalid @enderror" type="text" name="titulo" value="{{ isset($registro->titulo) ? $registro->titulo : old('titulo') }}" placeholder="Mínimo de 5 caracteres">
    @error('titulo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="descricao">Descrição da página*</label>
    <textarea  id="summernote" class="form-control form-control-lg @error('descricao') is-invalid @enderror" type="text" name="descricao" placeholder="Mínimo de 10 caracteres">{{ isset($registro->descricao) ? $registro->descricao : old('descricao') }}</textarea>
    @error('descricao')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="categoria_id">Selecione a área de conhecimento*</label>
    <select class="custom-select custom-select-lg @error('categoria_id') is-invalid @enderror" name="categoria_id" id="categorias">
        <option hidden disabled selected value>{{ __('Selecione uma área de conhecimento') }}</option>
        @foreach($categorias as $categoria)
            @if(isset($registro->categoria->id) && $categoria->id == $registro->categoria->id)
                <option value="{{ $categoria->id }}" selected>{{ ucfirst($categoria->nome) }}</option>
            @else
                <option value="{{ $categoria->id }}">{{ ucfirst($categoria->nome) }}</option>
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
    <label class="w-100" for="anexo">Anexo*
        <div class="d-flex flex-column align-items-center border rounded bg-white">
            <img id="img-foto" src="{{ asset($registro->anexo ?? asset('img/file-image.svg')) }}" alt="" style="max-height: 100px">
            <p>Escolher uma imagem jpeg, jpg, png ou gif.</p>
        </div>
        <input id="anexo" class="d-none form-control form-control-lg @error('anexo') is-invalid @enderror" type="file" name="anexo" placeholder="Escolha um arquivo jpeg, jpg, png ou gif" onchange="document.getElementById('img-foto').src = window.URL.createObjectURL(this.files[0])">
    </label>
    @error('anexo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
     <hr>
      <p>Área de conhecimento não cadastrada? <a class="" href="{{ route('auth.categoria.adicionar') }}">{{ __('Cadastrar Área de conhecimento') }}</a>.</p>
</div>
<script src="{{ asset('js/summernote_atlas_config.js') }}"></script> 