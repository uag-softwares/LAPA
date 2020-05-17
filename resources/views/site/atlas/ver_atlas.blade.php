@extends('layouts.app')

@section('titulo', 'Atlas Interativo')
@section('content')
<div class="d-flex position-relative">

    @if (count($paginas) >= 1)

        @include('site.atlas._sidebar')

    @endif

    <div id="page" class="container col-lg-10 atlas">    
        <h2>Atlas Interativo</h2>
        <div class="breadcrumbs d-flex text-left justify-content-lg-start justify-content-between">
            <p>
                <a href="{{ route('site.home') }}">Início</a> /
                <a href="{{ route('site.atlas.index') }}">Atlas interativo</a> /
                <a href="{{ route('site.atlas.disciplina', $categoria->disciplina->slug) }}">{{ ucfirst($categoria->disciplina->nome) }}</a> /
                {{ $categoria->nome ?? '' }} / 
            </p>
        </div>

        @if (count($paginas) < 1)
            <p>Ops, essa categoria ainda não possui páginas</p>
        @else

            @foreach ($paginas as $pagina)
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

        // Toggle pages on mobile
        $('#toggleLeftSidebar').on('click', function() {
            $('#leftSidebar').toggleClass('d-none', 'position-absolute', 'show');
            $('#leftSidebar').toggleClass('position-absolute');
            $('#leftSidebar').toggleClass('show');
            $('#toggleLeftSidebar').toggleClass('push');
            $('#toggleLeftSidebar a span').toggleClass('fa-chevron-right');
            $('#toggleLeftSidebar a span').toggleClass('fa-chevron-left');
        });
    </script>
@endsection