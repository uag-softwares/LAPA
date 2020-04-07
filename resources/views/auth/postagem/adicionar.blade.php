<html>
    <head>
        <title>
            Adicionar Postagem
        </title>
    </head>
    <body>
        <header>

        </header>

        <div class="container">
            <h1>Adicionar postagem</h1>
            <form action="{{ route('auth.postagem.salvar') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('auth.postagem._form')
                <div class="input-btn">
                    <button class="btn">Adicionar</button>
                </div>
            </form>
        </div>

        <footer>

        </footer>
    </body>
</html>