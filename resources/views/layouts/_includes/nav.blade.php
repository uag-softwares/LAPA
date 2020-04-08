        <div id="app">

            <header class="d-flex px-5 justify-content-around text-center align-items-center">
                <img class="d-none d-md-block" src="{{ asset('img/logo.png') }}" alt="">
                <div class="title">
                    <h2>Laboratório de Anatomia e Patologia Animal</h2>
                    <h3>Medicina Veterinária</h3>
                    <h3>Universidade Federal do Agreste de Pernambuco</h3>
                </div>
                <img class="d-none d-md-block" src="{{ asset('img/logo.png') }}" alt="">
            </header>

            <nav class="navbar navbar-expand-lg navbar-custom">
                <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ route('site.home') }}" class="nav-link">Início</a>
                        </li>
                    </ul>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <i class="fas fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="#" class="nav-link">Atlas Interativo</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Agenda</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Eventos</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Materiais</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Quem somos</a>
                            </li>
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link">Acesso</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a href="{{ route('auth.registros') }}" class="dropdown-item">Configurações</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Sair') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>