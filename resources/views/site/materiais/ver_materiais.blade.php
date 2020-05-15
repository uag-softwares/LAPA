@extends('layouts.app')

@section('titulo', 'Materiais')
@section('content')
<div class="d-flex position-relative">

    <div id="page" class="container col-lg-10 atlas">    
        <h2>Material</h2>

        @foreach ($paginas as $pagina)
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-8 text-center mb-4">
                    <h3 class="title">{{ $pagina->titulo }}</h3>
                    <p class="text">
                        {{ $pagina->texto }}
                    </p>
                    <a class="btn" href="{{ asset($pagina->anexo) }}" alt="" download="baixar">Baixar anexo</a>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                {{ $paginas->links() }}
            </div>
        @endforeach
        
    </div>
</div>
@endsection
