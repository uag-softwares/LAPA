<div class="form-group">
    <label for="nome">Nome da disciplina</label>
    <input class="form-control form-control-lg" type="text" name="nome" value="{{ isset($registro->nome) ? $registro->nome : '' }}" placeholder="Digite aqui o nome da disciplina">
</div>
<div class="form-group">
    <label for="user_id">Selecione o professor</label>
    <select class="form-control form-control-lg" name="user_id" id="professores">
        @foreach($users as $user)
            @if(isset($registro->user->id) && $user->id = $registro->user->id)
                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
            @else
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endif
        @endforeach
    </select>
</div>