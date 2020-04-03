<html>
    <head>
        <title>
            Gerenciar disciplinas
        </title>
    </head>
    <body>
        <header>

        </header>

        <div class="container">
            <h1>Gerenciar disciplinas</h1>
            <a href="{{ route('admin.disciplina.adicionar') }}" class="btn">Adicionar</a>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Professor</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->nome }}</td>
                        <td>A ser adicionado</td>
                        <td>
                            <a href="{{ route('admin.disciplina.editar', $registro->id) }}" class="btn">Editar</a>
                            <a href="{{ route('admin.disciplina.deletar', $registro->id) }}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar a disciplina?');">Deletar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <footer>

        </footer>
    </body>
</html>