
@include('layouts._includes.header')
    <main class="py-4">
        @yield('content')
        @yield('scripts')
    </main>
@include('layouts._includes.footer')

