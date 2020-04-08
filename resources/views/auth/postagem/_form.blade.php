<div class="form-group">
    <label for="titulo">Título da Postagem</label>
    <input class="form-control form-control-lg" type="text" name="titulo" value="{{ isset($registro->titulo) ? $registro->titulo : '' }}" placeholder="Digite aqui o titulo da postagem">
</div>
<div class="form-group">
    <label for="descricao">Descrição</label>
    <textarea class="form-control form-control-lg" type="text" name="descricao" placeholder="Descreva aqui a descrição da sua postagem">{{ isset($registro->descricao) ? $registro->descricao : '' }}</textarea>
</div>

<div class="form-group">
    <label for="nome">Data</label>
    <input class="form-control form-control-lg" type="datetime-local" name="data" value="{{ isset($registro->data) ? $registro->data : '' }}" placeholder="Escolha a data da postagem">
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
