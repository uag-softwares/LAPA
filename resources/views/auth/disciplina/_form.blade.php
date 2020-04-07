<div class="input-field">
    <label for="nome">Nome da disciplina</label>
    <input type="text" name="nome" value="{{ isset($registro->nome) ? $registro->nome : '' }}" placeholder="Digite aqui o nome da disciplina">
</div>
<div class="input field">
    <label for="professor">Selecione o professor</label>
    <select name="" id="professores"></select>
</div>