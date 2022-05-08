<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('assets/metismenu/metismenu.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" /> --}}
</head>

<body class="font-sans antialiased">

    @include('layouts.inc.header')

    <div class="flex min-h-screen pt-14">
        @include('layouts.inc.sidebar')

        <main class="pl-[15rem] main w-full">
            {{ $slot }}
        </main>
    </div>


    @stack('modals')
    <script src="{{ asset('assets/metismenu/jquery.js') }}"></script>
    <script src="{{ asset('assets/metismenu/metismenu.js') }}"></script>

    <script src="{{ asset('assets/admin/sidebar.js') }}"></script>
    <script>
        $("#metismenu").metisMenu();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script> --}}
    <x-livewire-alert::scripts />
</body>

</html>
