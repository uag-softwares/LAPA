        <div id="app">

            <header class="d-flex px-md-5 px-4 justify-content-around text-md-center text-left align-items-center">
                <div class="title d-md-none">
                    <h3>Laboratório de Anatomia e Patologia Animal</h3>
                </div>
                <img class="my-4" style="height:130px;" src="{{ asset('img/lapa-uag.png') }}" alt="">
                <div class="title d-none d-md-block">
                    <h4>Universidade Federal do Agreste de Pernambuco</h4>
                    <h3>Laboratório de Anatomia e Patologia Animal</h3>
                </div>
                <img class="my-4" style="height:130px;" src="{{ asset('img/logo-uag.png') }}" alt="">
            </header>

            <nav class="navbar navbar-expand-lg navbar-custom px-4">
                <div class="container">
                    <ul class="navbar-nav d-flex flex-row">
                        
                        @if(!Request::is('/')
                            && !Request::is('site/*/index') 
                            && !Request::is('gerenciar')
                            && !Request::is('site/visita/busca')
                            && !Request::is('login'))
                            <li class="nav-item mr-2 mr-lg-0">
                                <a title="Voltar" href="#" class="nav-link" type="button" onclick="history.back()">
                                    <span class="fas fa-arrow-left"></span>
                                </a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a href="{{ route('site.home') }}" class="nav-link">Início</a>
                        </li>
                    </ul>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <i class="fas fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item {{ Request::is('site/atlas/*') ? 'active' : '' }}">
                                <a href="{{ route('site.atlas.index') }}" class="nav-link">Atlas Interativo</a>
                            </li>
                            <li class="nav-item {{ Request::is('site/visita/*') ? 'active' : '' }}">
                                <a href="{{ route('site.visita.busca') }}" class="nav-link">Visitas</a>
                            </li>
                            <li class="nav-item dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Postagens
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a href="{{ route('site.postagens.indexEvento') }}" class="dropdown-item">Eventos</a>
                                    <a href="{{ route('site.postagens.indexNoticia') }}" class="dropdown-item">Notícias</a>
                                    <a href="{{ route('site.postagens.indexEdital') }}" class="dropdown-item">Editais e seleções</a>
                                </div>
                            </li>
                            <li class="nav-item {{ Request::is('site/materiais/*') ? 'active' : '' }}">
                                <a href="{{ route('site.materiais.index') }}" class="nav-link">Materiais</a>
                            </li>
                            <li class="nav-item {{ Request::is('site/contato/*') ? 'active' : '' }}">
                                <a href="{{ route('site.contato.index') }}" class="nav-link">Sobre</a>
                            </li>
                            


                     
                            <!-- Authentication Links -->
                            @guest
                               <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Acesso</a>
                            </li>
                            @else
                                <nav class="d-flex">
                                    <li class="nav-item">
                                        <a href="{{ route('auth.gerenciar') }}" title="Gerenciar" class="nav-link">
                                            <i class="fas fa-sliders-h"></i> Gerenciar
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('auth.registros') }}" title="Minha conta" class="nav-link">
                                            <i class="fas fa-user"></i> {{ Auth::user()->name ?? "" }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a title="Sair" class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i>
                                        </a>
                                    </li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
