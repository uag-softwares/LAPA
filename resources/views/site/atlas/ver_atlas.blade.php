@extends('layouts.app')

@section('titulo', 'Atlas Interativo')
@section('content')
<div class="d-flex position-relative">

    @if (count($paginas) >= 1)

        @include('site.atlas._sidebar')

    @endif

    <div id="page" class="d-flex flex-column container col-lg-10">    
        <h2>Atlas Interativo</h2>
        
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
                    <div class="col-md-4 col-12 mb-4">
                        <img class="img img-fluid" src="{{ asset($pagina->anexo) }}"> 
                    </div>
                </div>
                <div class="d-flex justify-content-md-center mt-auto pagination-container">
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