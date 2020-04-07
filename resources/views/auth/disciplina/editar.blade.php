<html>
    <head>
        <title>
            Editar disciplina
        </title>
    </head>
    <body>
        <header>

        </header>

        <div class="container">
            <h1>Editar disciplina</h1>
            <form action="{{ route('auth.disciplina.atualizar', $registro->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                @include('auth.disciplina._form')
                <div class="input-btn">
                    <button class="btn">Editar</button>
                </div>
            </form>
        </div>

        <footer>

        </footer>
    </body>
</html>