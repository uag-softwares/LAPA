<div class="input-field">
    <label for="titulo">Título da Postagem</label>
    <input type="text" name="titulo" value="{{ isset($registro->titulo) ? $registro->titulo : '' }}" placeholder="Digite aqui o titulo da postagem">
</div>
<div class="input-field">
    <label for="descricao">Descrição</label>
    <textarea type="text" name="descricao" placeholder="Descreva aqui a descrição da sua postagem">{{ isset($registro->descricao) ? $registro->descricao : '' }}</textarea>
</div>

<div class="input-field">
    <label for="nome">Data</label>
    <input type="date" name="data" value="{{ isset($registro->data) ? $registro->data : '' }}" placeholder="Escolha a data da postagem">
</div>
<div class="input-field">
    <label for="nome">Anexo</label>
    <input type="file" name="anexo">
</div>

@if(@isset($registro->anexo))
    <div class="input-field">
        <img src="{{ asset($registro->anexo) }}" alt="">
    </div>    
@endisset
