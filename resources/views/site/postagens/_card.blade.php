<div class="card home fadeInDown" data-anime="300">

    
    @if(isset($registro->anexo))
    <div class="card-header">
        <img src="{{ asset($registro->anexo ?? '/img/lapa-logo.png') }}" alt="{{ $registro->titulo }}">
    </div>
    @endif
    
    <div class="card-body">
        <h5>
            @if($registro->tipo_postagem == 'evento')
                <a href="{{ route('site.eventos.visualizar', $registro->slug) }}">
            @elseif($registro->tipo_postagem == 'noticia')
                <a href="{{ route('site.noticias.visualizar', $registro->slug) }}">
            @elseif($registro->tipo_postagem == 'edital')
                <a href="{{ route('site.editais.visualizar', $registro->slug) }}">
            @endif
                {{$registro->titulo}} 
            </a>
        </h5>
        {!! mb_strimwidth(strip_tags($registro->descricao), 0, 125, "...") !!}
    </div>
    
    @if($registro->tipo_postagem == 'evento')
        <div class="card-footer event">
                <span class="fas fa-calendar-alt"></span>
                Dia {{ date('d/m/Y', strtotime($registro->data)).' às '.date('H:i', strtotime($registro->hora)) }}
        </div>
    @endif

    <div class="card-footer">
        Publicado {{ date('d/m/Y', strtotime($registro->created_at)) }} às {{ date('H:i', strtotime($registro->created_at)) }}
    </div>
</div>