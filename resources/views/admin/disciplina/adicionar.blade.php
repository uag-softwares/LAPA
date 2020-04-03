<html>
    <head>
        <title>
            Adicionar disciplina
        </title>
    </head>
    <body>
        <header>

        </header>

        <div class="container">
            <h1>Adicionar disciplina</h1>
            <form action="{{ route('admin.disciplina.salvar') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('admin.disciplina._form')
                <div class="input-btn">
                    <button class="btn">Adicionar</button>
                </div>
            </form>
        </div>

        <footer>

        </footer>
    </body>
</html>