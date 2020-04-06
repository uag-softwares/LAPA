<html>
    <head>
        <title>
            Editar Postagem
        </title>
    </head>
    <body>
        <header>

        </header>

        <div class="container">
            <h1>Editar postagem</h1>
            <form action="{{ route('admin.postagem.atualizar', $registro->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                @include('admin.postagem._form')
                <div class="input-btn">
                    <button class="btn">Editar</button>
                </div>
            </form>
        </div>

        <footer>

        </footer>
    </body>
</html>