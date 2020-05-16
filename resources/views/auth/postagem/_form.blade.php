<div class="form-group">
    <label for="titulo">Título da Postagem*</label>
    <input class="form-control form-control-lg @error('titulo') is-invalid @enderror" type="text" name="titulo" value="{{ isset($registro->titulo) ? $registro->titulo : old('titulo') }}" placeholder="Digite aqui o titulo da postagem">
    @error('titulo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="descricao">Descrição*</label>
    <textarea id="summernote" class="form-control form-control-lg @error('descricao') is-invalid @enderror" type="text" name="descricao" placeholder="Descreva aqui a descrição da sua postagem">{{ isset($registro->descricao) ? $registro->descricao : old('descricao') }}</textarea>
    @error('descricao')
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

<div class="form-group">
    <label for="user_id">Selecione o professor</label>
    <select class="form-control form-control-lg" name="user_id" id="professores">
        <option hidden disabled selected value>{{ __('Selecione um professor') }}</option>
        <option value>{{ __('Nenhum') }}</option>
        @foreach($users as $user)
            @if(isset($registro->user->id) && $user->id = $registro->user->id)
                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
            @else
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endif
        @endforeach
    </select>
</div>
