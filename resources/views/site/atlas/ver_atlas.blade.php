@extends('layouts.app')

@section('titulo', 'Atlas Interativo')
@section('content')
<div class="d-flex position-relative">

    @if (count($paginas) >= 1)

        @include('site.atlas._sidebar')

    @endif

    <div id="page" class="d-flex flex-column container py-4 col-lg-10">    
        @if (count($paginas) < 1)
            <p>Ops, essa área de conhecimento ainda não possui páginas</p>
        @else

            @foreach ($paginas as $pagina)
                <div class="row justify-content-between fadeInDown" data-anime="300">
                    <div class="col-md-8 col-12 text-left">
                        <h2 class="title pb-3">{{ $pagina->titulo }}</h2>
                        <p class="info" style="text-transform: capitalize;">
                            <a style="color: white;" href="{{ route('site.atlas.disciplina', $categoria->disciplina) }}">
                                <span class="tag evento">{{ $categoria->disciplina->nome}}</span>
                            </a>
                            <span class="tag evento">/</span>
                            
                            <a style="color: white;" href="{{ route('site.atlas.categoria', $categoria) }}">
                                <span class="tag evento">{{ $categoria->nome }}</span>
                            </a>
                        </p>
                        <p class="text">
                            {!! $pagina->toArray()['descricao'] !!}
                        </p>
                    </div>
                    <div id="overlay"></div>
                    <div class="col-md-4 col-12 mb-4">
                        <img class="img img-fluid" src="{{ asset($pagina->anexo) }}"> 
                    </div>
                </div>
                <div class="d-flex justify-content-md-center mt-auto pagination-container fadeInDown" data-anime="700">
                    {{ $paginas->links() }}
                </div>
            @endforeach

        @endif

    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/toggle_sidebar.js') }}"></script>
@endsection