@extends('layouts.app')

@section('titulo', 'Atlas Interativo')
@section('content')
    <div class="container atlas">    
        <h2>Atlas Interativo</h2>
        @if (count($paginas) < 1)
            <div class="breadcrumbs d-flex text-left justify-content-sm-start justify-content-between">
                <p class="d-sm-block d-none">
                    <a href="{{ route('site.home') }}">Início</a> /
                    <a href="{{ route('site.atlas.index') }}">Atlas interativo</a> /
                    {{ $categoria->nome ?? '' }} / 
                </p>
            </div>
            <p>Ops, essa categoria ainda não possui páginas</p>
        @else
            @foreach ($paginas as $pagina)
                <div class="breadcrumbs d-flex text-left justify-content-sm-start justify-content-between">
                    <p class="d-sm-block d-none">
                        <a href="{{ route('site.home') }}">Início</a> /
                        <a href="{{ route('site.atlas.index') }}">Atlas interativo</a> /
                        {{ $categoria->nome ?? '' }} / 
                    </p>
                    <a class="btn btn-link d-sm-none d-block" title="Categorias" href="{{ route('site.atlas.index') }}">
                        <span class="fas fa-chevron-left"></span>
                    </a>
                    <div class="dropdown">
                        <a class="btn btn-link dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                            {{ $pagina->titulo }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                            @foreach ($registros as $registro)
                                <a class="dropdown-item" href="#">{{ $registro->titulo }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-md-8 col-12 text-left">
                        <h3 class="title">{{ $pagina->titulo }}</h3>
                        <p class="text">
                            {{ $pagina->descricao }}
                        </p>
                    </div>
                    <div id="overlay"></div>
                    <div class="col-md-4 col-12">
                        <img class="img img-fluid" src="{{ asset($pagina->anexo) }}"> 
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $paginas->links() }}
                </div>
            @endforeach
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        // Image to Lightbox Overlay 
        $('.img').on('click', function() {
        $('#overlay')
            .css({backgroundImage: `url(${this.src})`})
            .addClass('open')
            .one('click', function() { $(this).removeClass('open'); });
        });
    </script>
@endsection