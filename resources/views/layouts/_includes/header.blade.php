<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @yield('titulo') | LAPA - UFAPE    
        </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&display=swap" rel="stylesheet">
        <!-- Tamanho da font do cookie acessibilidade -->
        <script src="{{ asset('js/font_size_cookie.js') }}"></script>


        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/clndr.css') }}" rel="stylesheet">
        <link href="{{ asset('css/simple-anime.css') }}" rel="stylesheet">
        
        <!-- Bootstrap Datepicker -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css">

        <!-- Datatable -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
        
        <!-- include summernote css -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        
        <script>document.documentElement.classList.add("js")</script>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/pesquisa_atlas.js') }}"></script>
        <script src="{{ asset('js/pesquisa_materiais.js') }}"></script>

        <!-- reCAPTCHA-->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <!-- Vlibras -->
        <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
        <script>new window.VLibras.Widget('https://vlibras.gov.br/app');</script>
        <!-- br barra-->
        <script defer="defer" src="//barra.brasil.gov.br/barra.js" type="text/javascript"></script>
        <!-- Contraste-->
        <script type="text/javascript" src="js/contraste.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>

        <!-- Tradutor-->
        <script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>
        <script src="jquery.js"></script>
        <script src="jquery.translate.js"></script>
    </head>
    <body>
    @include('layouts._includes.barra_gov')
    @include('layouts._includes.barra_acessibilidade')
    @include('layouts._includes.nav')
    
