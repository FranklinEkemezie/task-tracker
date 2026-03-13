<!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Daily Task Tracker') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-canvas text-slate-900">
{{ $slot }}

@if (session()->has('toasts'))
    @php
        $messages = session('toasts', []);
    @endphp
    <div class="fixed right-6 top-6 z-50 flex w-full max-w-sm flex-col gap-3">
        @foreach ($messages as $toast)
            <x-toast
                :variant="data_get($toast, 'variant', 'info')"
                :title="data_get($toast, 'title')"
                :message="data_get($toast, 'message', '')"
            />
        @endforeach
    </div>
@endif
</body>
</html>
