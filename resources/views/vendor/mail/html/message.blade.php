@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
    <div class="d-flex">
        <img src="{{ asset('img/lapa-logo-light.png') }}" alt="Logo do laboratório de anatomia e patologia animal" style="max-width: 400px; width: 85%; align-self: flex-end;">
        <img src="{{ asset('img/logo-uag-light.png') }}" alt="Logo da Universidade Federal do Agreste de Pernambuco" style="max-width: 55px; width: 15%; align-self: center;">
    </div>
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
