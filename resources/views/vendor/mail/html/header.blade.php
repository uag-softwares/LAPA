<tr>
    <td class="header">
        <div style="display: flex; padding: 2em;">
            <a href="{{ $url }}" style="margin: 0 auto;">
                @if (trim($slot) === 'Laravel')
                    <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
                @else
                    {{ $slot }}
                @endif
            </a>
        </div>
    </td>
</tr>
